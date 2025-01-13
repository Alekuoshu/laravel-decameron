<?php

namespace App\Http\Requests;

use App\Models\Hotel;
use Illuminate\Foundation\Http\FormRequest;

class EditHotelRequest extends FormRequest
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
            'nombre' => 'required|unique:hoteles,nombre,' . $this->id,
            'direccion' => 'required',
            'ciudad' => 'required',
            'nit' => 'required|regex:/^\d{9}-\d$/|unique:hoteles,nit,' . $this->id,
            'numero_hab' => 'required|integer|min:1',
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
            'numero_hab.integer' => 'El numero de habitaciones debe ser un número entero',
            'numero_hab.min' => 'El numero de habitaciones debe ser mayor o igual a 1',
            'nit.regex' => 'El NIT debe tener el formato XXXXXXXXX-X',
        ];
    }

    /**
     * Realiza una validación adicional una vez que se han ejecutado todas las reglas de validación definidas.
     * Verifica que el nuevo valor para el numero de habitaciones sea mayor o igual a la suma actual de habitaciones
     * del hotel que se esta editando. En caso de que no se cumpla esta condición, se agrega un error para el campo numero_hab.
     *
     * @param \Illuminate\Validation\Validator $validator
     *
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $sumaHabitaciones = Hotel::find($this->input('id'))->habitaciones->sum('cantidad');
            if ($this->input('numero_hab') < $sumaHabitaciones) {
                $validator->errors()->add('numero_hab', 'La nueva capacidad máxima es menor que la suma actual de habitaciones');
            }
        });
    }
}
