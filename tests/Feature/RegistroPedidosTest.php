<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Categoria;

class RegistroPedidosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visualizar_detalle_de_producto()
    {
        // Crear una categoría
        $categoria = Categoria::create([
            'nombre' => 'Repostería',
            'slug' => 'reposteria',
        ]);

        // Crear un producto sin definir stock (o con stock nulo)
        $producto = Producto::create([
            'nombre' => 'Torta de Chocolate',
            'slug' => 'torta-chocolate',
            'descripcion' => 'Torta clásica con relleno de chocolate.',
            'precio' => 45000,
            'imagen' => 'torta-chocolate.jpg',
            'categoria_id' => $categoria->id,
            // 'stock' => null, // Se omite a propósito para causar el fallo
        ]);

        // Simular acceso a la vista del producto
        $response = $this->get("/reposteria/{$producto->slug}");

        // Validar que la página carga correctamente
        $response->assertStatus(200);

        // Validaciones esperadas
        $response->assertSee('Torta de Chocolate');
        $response->assertSee('Descripción');
        $response->assertSee('Precio');
        $response->assertSee('Comprar ahora');

        // 🚨 Este es el punto de fallo intencional:
        // se espera ver el texto 'Stock', pero no está presente
        $response->assertSeeText('Stock');
    }

    /** @test */
    public function validar_registro_exitoso_mediante_formulario_de_compra_directa()
    {
        // Crear una categoría válida
        $categoria = Categoria::create([
            'nombre' => 'Repostería',
            'slug' => 'reposteria',
        ]);

        // Crear un producto asociado a la categoría
        $producto = Producto::create([
            'nombre' => 'Torta Red Velvet',
            'slug' => 'torta-red-velvet',
            'descripcion' => 'Deliciosa torta Red Velvet con cobertura de queso crema.',
            'precio' => 50000,
            'imagen' => 'torta-red-velvet.jpg',
            'categoria_id' => $categoria->id,
        ]);

        // Simular los datos del formulario de compra directa
        $datos = [
            'nombre' => 'Juan',
            'telefono' => '3001234567',
            'email' => 'juan_ochoa@ejemplo.com',
            'direccion' => '123 Calle Principal',
            'cantidad' => 1,
            'precio_unitario' => $producto->precio,
            'fecha_entrega' => now()->addDays(2)->format('Y-m-d'),
            'producto_id' => $producto->id,
        ];

        // Ejecutar el método store del PedidoController
        $response = $this->post(route('pedido.store', $producto), $datos);

        // Verificar la redirección y el mensaje de éxito
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success', 'Tu pedido ha sido realizado con éxito');

        // Validar que los registros fueron creados correctamente
        $this->assertDatabaseHas('clientes', [
            'email' => 'juan_ochoa@ejemplo.com',
            'nombre' => 'juan',
        ]);

        $this->assertDatabaseHas('pedidos', [
            'estado' => 'pendiente',
            'total' => 50000,
        ]);

        $this->assertDatabaseHas('detalles_pedido', [
            'producto_id' => $producto->id,
            'cantidad' => 1,
            'precio_unitario' => 50000,
        ]);
    }
}
