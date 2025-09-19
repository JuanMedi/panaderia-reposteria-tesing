<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:clientes',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del cliente es obligatorio',
            'nombre.max' => 'El nombre no debe exceder los 100 caracteres',

            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Debe ser un correo electrónico válido',
            'email.unique' => 'Este correo ya está registrado',

            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.max' => 'El teléfono no debe exceder los 20 caracteres',

            'direccion.required' => 'La dirección es obligatoria',
            'direccion.max' => 'La dirección no debe exceder los 255 caracteres'
        ];
    }
}
