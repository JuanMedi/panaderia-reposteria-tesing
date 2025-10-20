<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected Producto $producto;

    protected function setUp(): void
    {
        parent::setUp();

        // Ejecutar migraciones
        $this->artisan('migrate');

        // Crear categoría requerida por la relación
        $categoria = Categoria::create([
            'nombre' => 'Repostería',
            'slug' => 'reposteria',
            'descripcion' => 'Productos de pastelería artesanal',
        ]);

        // Crear producto asociado a la categoría
        $this->producto = Producto::create([
            'nombre' => 'Pastel de Chocolate',
            'descripcion' => 'Pastel clásico',
            'precio' => 50000,
            'imagen' => 'pastel.jpg',
            'slug' => 'pastel-de-chocolate',
            'categoria_id' => $categoria->id,
        ]);
    }

    public function test_carga_pagina_carrito_correctamente(): void
    {
        $response = $this->get(route('reposteria.show', $this->producto->slug));
        $response->assertStatus(200);
    }

    public function test_muestra_error_si_nombre_vacio(): void
    {
        $response = $this->post(route('pedido.store', ['producto' => $this->producto->slug]), [
            'nombre' => '',
            'email' => 'camila.z@email.com',
            'telefono' => '3219876543',
            'direccion' => 'Calle 20 #15-50',
            'fecha_entrega' => now()->addDay()->toDateString(),
            'cantidad' => 1,
            'producto_id' => $this->producto->id,
            'precio_unitario' => $this->producto->precio,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['nombre']);
    }

    public function test_muestra_error_si_email_invalido(): void
    {
        $response = $this->post(route('pedido.store', ['producto' => $this->producto->slug]), [
            'nombre' => 'Laura G.',
            'email' => 'test@.com',
            'telefono' => '3219876543',
            'direccion' => 'Calle 20 #15-50',
            'fecha_entrega' => now()->addDay()->toDateString(),
            'cantidad' => 1,
            'producto_id' => $this->producto->id,
            'precio_unitario' => $this->producto->precio,
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_muestra_error_si_telefono_invalido(): void
    {
        $response = $this->post(route('pedido.store', ['producto' => $this->producto->slug]), [
            'nombre' => 'Laura G.',
            'email' => 'camila.z@email.com',
            'telefono' => 'abc',
            'direccion' => 'Calle 20 #15-50',
            'fecha_entrega' => now()->addDay()->toDateString(),
            'cantidad' => 1,
            'producto_id' => $this->producto->id,
            'precio_unitario' => $this->producto->precio,
        ]);

        $response->assertSessionHasErrors(['telefono']);
    }

    public function test_muestra_error_si_direccion_vacia(): void
    {
        $response = $this->post(route('pedido.store', ['producto' => $this->producto->slug]), [
            'nombre' => 'Laura G.',
            'email' => 'camila.z@email.com',
            'telefono' => '3219876543',
            'direccion' => '',
            'fecha_entrega' => now()->addDay()->toDateString(),
            'cantidad' => 1,
            'producto_id' => $this->producto->id,
            'precio_unitario' => $this->producto->precio,
        ]);

        $response->assertSessionHasErrors(['direccion']);
    }

    public function test_guarda_pedido_con_datos_validos(): void
    {
        $response = $this->post(route('pedido.store', ['producto' => $this->producto->slug]), [
            'nombre' => 'Laura G.',
            'email' => 'laura.g@email.com',
            'telefono' => '3219876543',
            'direccion' => 'Calle 20 #15-50',
            'fecha_entrega' => now()->addDay()->toDateString(),
            'cantidad' => 2,
            'producto_id' => $this->producto->id,
            'precio_unitario' => $this->producto->precio,
        ]);

        // Redirección exitosa al home con mensaje de éxito
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success', 'Tu pedido ha sido realizado con éxito');

        // Verificar que el pedido se haya guardado
        $this->assertDatabaseHas('pedidos', [
            'estado' => 'pendiente',
            'total' => 2 * $this->producto->precio,
        ]);

        // Verificar que el cliente se haya creado
        $this->assertDatabaseHas('clientes', [
            'email' => 'laura.g@email.com',
            'nombre' => 'laura g.',
        ]);

        // Verificar que se haya creado el detalle del pedido
        $this->assertDatabaseHas('detalles_pedido', [
            'producto_id' => $this->producto->id,
            'cantidad' => 2,
            'precio_unitario' => $this->producto->precio,
        ]);
    }
}
