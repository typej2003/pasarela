<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'MARCA',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('categories')->insert([
            'name' => 'LUBRICANTE',
            'description' => 'EXCELENTE PARA TODO TIPO DE VEHICULOS',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 2,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('categories')->insert([
            'name' => 'PRODUCTO DE LIMPIEZA',
            'description' => 'EXCELENTE PARA TODO TIPO DE VEHICULOS',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 3,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('categories')->insert([
            'name' => 'ACCESORIO MOTOR',
            'description' => 'ACCESORIO PARA ELEMENTO DEL MOTOR',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '0',
            'posicionMenu' => 4,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('categories')->insert([
            'name' => 'MOTORES',
            'description' => 'MORORES DE VEHICULOS',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '0',
            'posicionMenu' => 5,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('categories')->insert([
            'name' => 'Categoria 6',
            'avatar' => '',
            'user_id' => '1',
            'comercio_id' => '1',
            'itemMenu' => '0',
            'posicionMenu' => 6,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'RENAULT',
            'avatar' => 'renault.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'PEUGEOT',
            'avatar' => 'peugeot.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 2,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'CITROEN',
            'avatar' => 'citroen.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 3,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'TOYOTA',
            'avatar' => 'toyota.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 4,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'WOLKSWAGEN',
            'avatar' => 'wolkswagen.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 5,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'FORD',
            'avatar' => 'ford.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 6,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'FIAT',
            'avatar' => 'fiat.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 7,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'CHEVROLET',
            'avatar' => 'chevrolet.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 8,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'CHERY',
            'avatar' => 'chery.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '1',
            'itemMenu' => '1',
            'posicionMenu' => 9,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'ACEITE MINERAL',
            'avatar' => 'aceite.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '2',
            'itemMenu' => '1',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'ACEITE SINTETICO',
            'avatar' => 'aceite1.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '2',
            'itemMenu' => '1',
            'posicionMenu' => 2,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'ARTICULO DE LIMPIEZA',
            'avatar' => 'limpiador.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '3',
            'itemMenu' => '0',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'EMPACADURAS',
            'avatar' => 'empacadura.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '4',
            'itemMenu' => '0',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('subcategories')->insert([
            'name' => 'MOTORES',
            'avatar' => 'motor.png',
            'user_id' => '1',
            'comercio_id' => '1',
            'category_id' => '5',
            'itemMenu' => '0',
            'posicionMenu' => 1,
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);
    }
}

