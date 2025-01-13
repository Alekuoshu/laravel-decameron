<?php

namespace App\Models;

use App\Models\Habitacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hoteles';

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'nit',
        'numero_hab',
    ];

    /**
     * Devuelve las habitaciones asociadas a este hotel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class);
    }
}
