<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|unique:hoteles,nombre',
            'direccion' => 'required',
            'ciudad' => 'required',
            'nit' => 'required|unique:hoteles,nit|regex:/^\d{9}-\d$/',
            'numero_hab' => 'required',
        ];
    }

    /**
     * Personaliza los mensajes de error para las reglas de validación.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.unique' => 'El nombre ya está registrado',
            'direccion.required' => 'La dirección es obligatoria',
            'ciudad.required' => 'La ciudad es obligatoria',
            'nit.required' => 'El NIT es obligatorio',
            'nit.unique' => 'El NIT ya está registrado',
            'numero_hab.required' => 'El numero de habitaciones es obligatorio',
            'nit.regex' => 'El NIT debe tener el formato XXXXXXXXX-X',
        ];
    }
}
