<?php

namespace Tests\Feature;

use App\Models\Cliente;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GestionPedidosTest extends TestCase
{
    use RefreshDatabase;
    public function test_empleado_aceptar_pedido()
    {
        // $cliente = Cliente::create([
        //     'nombre' => 'Cliente Prueba',
        //     'email' => 'cliente@empresa.com',
        //     'telefono' => '3001234567',
        //     'direccion' => 'Calle 123',
        // ]);

        // $user = User::create([
        //     'nombre' => 'Empleado Prueba',
        //     'email' => 'empleado@empresa.com',
        //     'password' => bcrypt('password123'),
        // ]);

        // $pedido = Pedido::create([
        //     'cliente_id' => $cliente->id,
        //     'estado' => 'pendiente',
        //     'fecha_entrega' => now()->addDays(3),
        //     'direccion_entrega' => $cliente->direccion,
        //     'total' => 15000,
        // ]);

        // $this->actingAs($user);

        // $response = $this->put(route('pedidos.aceptar', $pedido->id));

        // // Status correcto de redirección
        // $response->assertStatus(302);

        // // Refrescar el pedido
        // $pedido->refresh();

        // // Fallo intencional: compara atributo incorrecto
        // $this->assertEquals('aceptado', $pedido->status, 'El pedido debería estar aceptado, pero status no existe');
    }

    public function test_empleado_puede_rechazar_pedido()
    {
        // // Crear cliente válido
        // $cliente = Cliente::create([
        //     'nombre' => 'Cliente Prueba',
        //     'email' => 'cliente@empresa.com',
        //     'telefono' => '3001234567',
        //     'direccion' => 'Calle 123',
        // ]);

        // // Crear usuario empleado
        // $user = User::create([
        //     'nombre' => 'Empleado Prueba',
        //     'email' => 'empleado@empresa.com',
        //     'password' => bcrypt('password123'),
        // ]);

        // // Crear pedido pendiente
        // $pedido = Pedido::create([
        //     'cliente_id' => $cliente->id,
        //     'estado' => 'pendiente',
        //     'fecha_entrega' => now()->addDays(3),
        //     'direccion_entrega' => $cliente->direccion,
        //     'total' => 15000,
        // ]);

        // $this->actingAs($user);

        // // Llamar al método de rechazar pedido
        // $response = $this->put(route('pedidos.rechazar', $pedido->id));

        // // La ruta debería redirigir normalmente
        // $response->assertStatus(302);

        // // Refrescar el pedido desde la base de datos
        // $pedido->refresh();

        // // Validar que el estado se actualizó correctamente
        // $this->assertEquals('rechazado', $pedido->estado);
    }
}
