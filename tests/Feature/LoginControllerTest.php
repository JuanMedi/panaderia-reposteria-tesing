<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_with_nonexistent_email_shows_generic_error()
    {
        $response = $this->post(route('login'), [
            'username' => 'noexiste@test.com',
            'password' => 'Cualquier123',
        ]);

        $response->assertSessionHasErrors(['username']);
        $this->assertGuest();
    }

    public function test_login_with_valid_email_wrong_password_shows_generic_error()
    {
        DB::table('users')->insert([
            'nombre' => 'Empleado',
            'email' => 'empleado@test.com',
            'password' => 'CorrectPass123', // texto plano para coincidir con el controlador
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->post(route('login'), [
            'username' => 'empleado@test.com',
            'password' => 'claveErronea123',
        ]);

        $response->assertSessionHasErrors(['username']);
        $this->assertGuest();
    }

    public function test_login_with_empty_fields_shows_validation_errors()
    {
        $response = $this->post(route('login'), [
            'username' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['username', 'password']);
        $this->assertGuest();
    }

    public function test_successful_login_authenticates_and_redirects()
    {
        DB::table('users')->insert([
            'nombre' => 'Empleado',
            'email' => 'empleado@test.com',
            'password' => 'CorrectPass123',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::where('email', 'empleado@test.com')->first();

        $response = $this->post(route('login'), [
            'username' => 'empleado@test.com',
            'password' => 'CorrectPass123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_session_expires_after_inactivity_fails_initially()
    {
        // Crear usuario válido
        $user = \App\Models\User::create([
            'nombre' => 'Empleado',
            'email' => 'empleado@test.com',
            'password' => 'ClaveValida123',
        ]);

        // Iniciar sesión
        $response = $this->post(route('login'), [
            'username' => 'empleado@test.com',
            'password' => 'ClaveValida123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);

        // Simular 15 minutos de inactividad
        $this->travel(16)->minutes();

        // Intentar acceder al dashboard tras el tiempo
        $response = $this->get('/dashboard');

        // Esperado: debería cerrar sesión y redirigir a login
        $response->assertRedirect('/login'); // Este fallo indica que la expiración aún no se implementa
    }
}
