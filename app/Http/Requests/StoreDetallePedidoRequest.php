<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetallePedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            // Reglas para pedido_id
            'pedido_id.required' => 'El pedido es obligatorio',
            'pedido_id.exists' => 'El pedido seleccionado no existe',

            // Reglas para producto_id
            'producto_id.required' => 'El producto es obligatorio',
            'producto_id.exists' => 'El producto seleccionado no existe',

            // Reglas para cantidad
            'cantidad.required' => 'La cantidad es obligatoria',
            'cantidad.integer' => 'La cantidad debe ser un número entero',
            'cantidad.min' => 'La cantidad mínima permitida es 1',

            // Reglas para precio_unitario
            'precio_unitario.required' => 'El precio unitario es obligatorio',
            'precio_unitario.numeric' => 'El precio debe ser un valor numérico',
            'precio_unitario.min' => 'El precio no puede ser negativo'
        ];
    }
}
