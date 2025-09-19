<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductoPanaderiaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('productos', 'slug')->ignore($this->producto)
            ],
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'categoria_id' => 'required|exists:categorias,id'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del producto es obligatorio',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres',

            'slug.required' => 'El slug es obligatorio',
            'slug.unique' => 'Este slug ya está registrado',
            'slug.max' => 'El slug no debe exceder los 255 caracteres',

            'descripcion.required' => 'La descripción es obligatoria',

            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un valor numérico',
            'precio.min' => 'El precio mínimo permitido es 0',

            'imagen.image' => 'El archivo debe ser una imagen válida',
            'imagen.mimes' => 'Formatos permitidos: JPEG, PNG o JPG',
            'imagen.max' => 'El tamaño máximo permitido es 5MB',

            'categoria_id.required' => 'Debe seleccionar una categoría',
            'categoria_id.exists' => 'La categoría seleccionada no existe'
        ];
    }
}
