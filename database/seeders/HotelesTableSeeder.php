<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HotelesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hoteles')->delete();
        
        \DB::table('hoteles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Hotel del lago',
                'direccion' => 'Avenida Chile 10',
                'ciudad' => 'Barranquilla',
                'nit' => '757574412-9',
                'numero_hab' => 24,
                'created_at' => '2025-01-13 12:56:39',
                'updated_at' => '2025-01-13 12:56:39',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Hotel 7 Estrellas',
                'direccion' => 'Carrera 42B #116-121',
                'ciudad' => 'Bogotá',
                'nit' => '757574412-4',
                'numero_hab' => 30,
                'created_at' => '2025-01-13 12:57:09',
                'updated_at' => '2025-01-13 12:57:09',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Hilton INT',
                'direccion' => 'La coruña 20-36',
                'ciudad' => 'Santa Marta',
                'nit' => '101611798-1',
                'numero_hab' => 50,
                'created_at' => '2025-01-13 12:57:50',
                'updated_at' => '2025-01-13 12:57:50',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Hotel Decameron',
                'direccion' => 'Calle 100-82, Suba',
                'ciudad' => 'Bogotá',
                'nit' => '326546987-9',
                'numero_hab' => 40,
                'created_at' => '2025-01-13 13:01:50',
                'updated_at' => '2025-01-13 13:01:50',
            ),
        ));
        
        
    }
}