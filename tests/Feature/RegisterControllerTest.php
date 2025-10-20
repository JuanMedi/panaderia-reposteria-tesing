<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function muestra_el_formulario_de_registro()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertSee('Registro de empleados');
    }

    /** @test */
    public function muestra_error_si_falta_el_email()
    {
        $response = $this->post(route('register.submit'), [
            'nombre' => 'Susan',
            'email' => '',
            'password' => '12345',
            'password_confirmation' => '12345',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function muestra_error_si_faltan_campos()
    {
        $response = $this->post(route('register.submit'), [
            'nombre' => '',
            'email' => 'Susan@gmail.com',
            'password' => '',
            'password_confirmation' => '12345',
        ]);

        $response->assertSessionHasErrors(['nombre']);
    }

    /** @test */
    public function muestra_error_si_las_contrasenas_no_coinciden()
    {
        $response = $this->post(route('register.submit'), [
            'nombre' => 'Susan',
            'email' => 'Susan@gmail.com',
            'password' => '12345',
            'password_confirmation' => '32453',
        ]);

        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function registra_usuario_con_datos_correctos()
    {
        $response = $this->post(route('register.submit'), [
            'nombre' => 'Susan',
            'email' => 'Susan@gmail.com',
            'password' => '12345',
            'password_confirmation' => '12345',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('users', ['email' => 'Susan@gmail.com']);
    }

    /** @test */
    public function evita_registro_con_correo_existente()
    {
        User::factory()->create(['email' => 'Susan@gmail.com']);

        $response = $this->post(route('register.submit'), [
            'nombre' => 'Alejandro',
            'email' => 'Susan@gmail.com',
            'password' => '12345',
            'password_confirmation' => '12345',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function autentica_y_redirige_al_dashboard_cuando_el_registro_es_valido()
    {
        // Ejecuta el registro con datos válidos (cumplen las reglas actuales)
        $response = $this->post(route('register.submit'), [
            'nombre' => 'Susan',
            'email' => 'susan@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        // Verifica redirección al dashboard
        $response->assertRedirect(route('dashboard'));

        // Confirma existencia del usuario en base de datos
        $this->assertDatabaseHas('users', [
            'email' => 'susan@example.com',
        ]);

        // Verifica que el usuario esté autenticado tras el registro
        $this->assertAuthenticated();
    }
}
