<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin Decameron',
                'email' => 'test.decameron@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BNaTaUuIEcACnNksWX/0pO2R07KNmWrzbx68/u0T8bwYQoNGcy2Pu',
                'remember_token' => NULL,
                'created_at' => '2025-01-10 05:10:21',
                'updated_at' => '2025-01-10 05:10:21',
            ),
        ));
        
        
    }
}