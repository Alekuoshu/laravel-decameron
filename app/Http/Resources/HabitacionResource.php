<?php

namespace App\Http\Resources;

use App\Http\Resources\HotelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HabitacionResource extends JsonResource
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
            'hotel_id' => $this->hotel_id,
            'tipo_habitacion' => $this->tipo_habitacion,
            'acomodacion' => $this->acomodacion,
            'cantidad' => $this->cantidad,
            // 'hotel' => $this->hotel,
        ];
    }
}
