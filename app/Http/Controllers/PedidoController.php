<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoRequest;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\DetallePedido;
use App\Models\Producto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    public function index()
    {
        // Usar distinct() para evitar duplicados por JOIN implícito
        $pedidos = Pedido::with(['cliente', 'detalles.producto'])
                    ->orderBy('id', 'desc')
                    ->get()
                    ->unique('id'); // Elimina duplicados a nivel de colección

        return view('empleados.dashboard', compact('pedidos'));
    }



    public function create()
    {
        $clientes = Cliente::all();
        return view('pedidos.create', compact('clientes'));
    }

    public function store(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'fecha_entrega' => 'required|date|after_or_equal:today',
            'cantidad' => 'required|integer|min:1',
            'producto_id' => 'required|exists:productos,id',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        // Verificar si el cliente ya existe por email
        $cliente = Cliente::firstOrCreate(
            ['email' => strtolower($validated['email'])],
            [
                'nombre' => $validated['nombre'],
                'telefono' => $validated['telefono'],
                'direccion' => $validated['direccion'],
            ]
        );

        // Calcular el total
        $total = $validated['cantidad'] * $validated['precio_unitario'];

        // Crear el pedido
        $pedido = Pedido::create([
            'cliente_id' => $cliente->id,
            'fecha_entrega' => $validated['fecha_entrega'],
            'estado' => 'pendiente', // o el estado inicial que uses
            'total' => $total,
            'direccion_entrega' => $validated['direccion'],
        ]);

        // Crear detalle del pedido
        DetallePedido::create([
            'pedido_id' => $pedido->id,
            'producto_id' => $producto->id,
            'cantidad' => $validated['cantidad'],
            'precio_unitario' => $validated['precio_unitario'],
        ]);

        return redirect()->route('home')
            ->with('success', 'Tu pedido ha sido realizado con éxito');
    }


    public function show(Pedido $pedido)
    {
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('pedidos.edit', compact('pedido', 'clientes'));
    }

    public function update(StorePedidoRequest $request, Pedido $pedido)
    {
        $pedido->update($request->all());
        return redirect()->route('pedidos.index');
    }

    public function aceptar(Pedido $pedido)
    {
        $pedido->update(['estado' => 'activo']);
        return redirect()->route('dashboard');
    }

    public function rechazar(Pedido $pedido)
    {
        $pedido->update(['estado' => 'rechazado']);
        return redirect()->route('dashboard');
    }

    public function destroy(Pedido $pedido)
    {
        // Eliminar detalles asociados primero
        $pedido->detalles()->delete();

        // Eliminar el pedido
        $pedido->delete();

        return redirect()->route('dashboard');
    }

}
