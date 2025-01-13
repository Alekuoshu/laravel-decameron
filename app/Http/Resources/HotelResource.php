<?php

namespace App\Http\Resources;

use App\Http\Resources\HabitacionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'nit' => $this->nit,
            'numero_hab' => $this->numero_hab,
            'habitaciones' => $this->habitaciones,
        ];
    }
}
