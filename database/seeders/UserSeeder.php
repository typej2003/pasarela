<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'identificationNac' => 'V',
            'identificationNumber' => '13053081',
            'name' => 'typej2003',
            'email' => 'typej2003@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('datos_basicos')->insert([
            'user_Id' => 1,
            'telefono' => '04165800403',
            'direccion' => 'Cumana-Villa Felicidad I',
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

    }
}
