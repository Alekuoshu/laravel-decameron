<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HabitacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('habitaciones')->delete();
        
        \DB::table('habitaciones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Estándar',
                'acomodacion' => 'Sencilla',
                'cantidad' => 10,
                'created_at' => '2025-01-13 12:58:12',
                'updated_at' => '2025-01-13 12:58:12',
            ),
            1 => 
            array (
                'id' => 2,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Estándar',
                'acomodacion' => 'Doble',
                'cantidad' => 5,
                'created_at' => '2025-01-13 12:58:22',
                'updated_at' => '2025-01-13 12:58:22',
            ),
            2 => 
            array (
                'id' => 3,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Junior',
                'acomodacion' => 'Triple',
                'cantidad' => 15,
                'created_at' => '2025-01-13 12:58:38',
                'updated_at' => '2025-01-13 12:58:38',
            ),
            3 => 
            array (
                'id' => 4,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Junior',
                'acomodacion' => 'Cuádruple',
                'cantidad' => 5,
                'created_at' => '2025-01-13 12:58:48',
                'updated_at' => '2025-01-13 12:58:48',
            ),
            4 => 
            array (
                'id' => 5,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Suite',
                'acomodacion' => 'Sencilla',
                'cantidad' => 5,
                'created_at' => '2025-01-13 12:58:57',
                'updated_at' => '2025-01-13 12:58:57',
            ),
            5 => 
            array (
                'id' => 6,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Suite',
                'acomodacion' => 'Doble',
                'cantidad' => 3,
                'created_at' => '2025-01-13 12:59:05',
                'updated_at' => '2025-01-13 12:59:05',
            ),
            6 => 
            array (
                'id' => 7,
                'hotel_id' => 3,
                'tipo_habitacion' => 'Suite',
                'acomodacion' => 'Triple',
                'cantidad' => 7,
                'created_at' => '2025-01-13 12:59:19',
                'updated_at' => '2025-01-13 12:59:30',
            ),
            7 => 
            array (
                'id' => 8,
                'hotel_id' => 2,
                'tipo_habitacion' => 'Estándar',
                'acomodacion' => 'Sencilla',
                'cantidad' => 13,
                'created_at' => '2025-01-13 12:59:48',
                'updated_at' => '2025-01-13 12:59:48',
            ),
            8 => 
            array (
                'id' => 9,
                'hotel_id' => 2,
                'tipo_habitacion' => 'Junior',
                'acomodacion' => 'Triple',
                'cantidad' => 12,
                'created_at' => '2025-01-13 13:00:03',
                'updated_at' => '2025-01-13 13:00:03',
            ),
            9 => 
            array (
                'id' => 10,
                'hotel_id' => 1,
                'tipo_habitacion' => 'Estándar',
                'acomodacion' => 'Doble',
                'cantidad' => 5,
                'created_at' => '2025-01-13 13:00:21',
                'updated_at' => '2025-01-13 13:00:21',
            ),
            10 => 
            array (
                'id' => 11,
                'hotel_id' => 1,
                'tipo_habitacion' => 'Junior',
                'acomodacion' => 'Cuádruple',
                'cantidad' => 10,
                'created_at' => '2025-01-13 13:00:32',
                'updated_at' => '2025-01-13 13:00:32',
            ),
            11 => 
            array (
                'id' => 12,
                'hotel_id' => 1,
                'tipo_habitacion' => 'Suite',
                'acomodacion' => 'Doble',
                'cantidad' => 5,
                'created_at' => '2025-01-13 13:00:51',
                'updated_at' => '2025-01-13 13:00:51',
            ),
        ));
        
        
    }
}