<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^[0-9]+$/|min:7|max:15',
            'direccion' => 'required|string|max:255',
            'fecha_entrega' => 'required|date|after_or_equal:today',
            'cantidad' => 'required|integer|min:1',
            'producto_id' => 'required|exists:productos,id',
            'precio_unitario' => 'required|numeric|min:0',
        ];
    }
}
