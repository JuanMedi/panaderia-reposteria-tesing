<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_entrega' => 'required|date|after_or_equal:today'
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'Debe seleccionar un cliente',
            'cliente_id.exists' => 'El cliente seleccionado no existe',

            'fecha_entrega.required' => 'La fecha de entrega es obligatoria',
            'fecha_entrega.date' => 'Debe ser una fecha válida',
            'fecha_entrega.after_or_equal' => 'La fecha no puede ser anterior a hoy'
        ];
    }
}
