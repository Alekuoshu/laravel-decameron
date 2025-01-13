<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditHabitacionRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'tipo_habitacion' => 'required|in:Estándar,Junior,Suite',
            'acomodacion' => [
                'required',
                'in:Sencilla,Doble,Triple,Cuádruple',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->tipo_habitacion == 'Estándar' && !in_array($value, ['Sencilla', 'Doble'])) {
                        $fail('La acomodación debe ser Sencilla o Doble para el tipo de habitación Estándar');
                    } elseif ($request->tipo_habitacion == 'Junior' && !in_array($value, ['Triple', 'Cuádruple'])) {
                        $fail('La acomodación debe ser Triple o Cuádruple para el tipo de habitación Junior');
                    } elseif ($request->tipo_habitacion == 'Suite' && !in_array($value, ['Sencilla', 'Doble', 'Triple'])) {
                        $fail('La acomodación debe ser Sencilla, Doble o Triple para el tipo de habitación Suite');
                    }
                },
            ],
            'cantidad' => 'required|integer|min:1',
        ];
    }

    /**
     * Personaliza los mensajes de error para las validaciones.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'tipo_habitacion.required' => 'El tipo de habitación es obligatorio',
            'tipo_habitacion.in' => 'El tipo de habitación debe ser Estándar, Junior o Suite',
            'acomodacion.required' => 'La acomodación es obligatoria',
            'acomodacion.in' => 'La acomodación debe ser Sencilla, Doble, Triple o Cuádruple',
            'cantidad.required' => 'La cantidad es obligatoria',
            'cantidad.integer' => 'La cantidad debe ser un número entero',
            'cantidad.min' => 'La cantidad debe ser mayor o igual a 1',
        ];
    }
}
