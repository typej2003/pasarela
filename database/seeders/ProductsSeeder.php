<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'code_lote' => 'A0001',
            'code' => 'A0001',
            'name' => 'ACEITE MINERAL 1',
            'description' => 'ACEITE DE MOTOR 15 40',
            'avatar' => 'aceite.png',
            'brand_id' => 1, //marca
            'container_id' => 1, //envase
            'currency' => '$', //moneda
            'price1' => 4.0, //precio al detal
            'profit_price' => 12, // porcentaje de ganancia
            'price_mayor' => 3, //precio al mayor
            'profit_mayor' => 12, // porcentaje de ganancia
            'price_offer' => 3, //precio de oferta
            'profit_offer' => 12, // porcentaje de ganancia
            'price_divisa' => 41, //precio del dolar cuando se adquirió
            'delivery' => 'NO', // Si o No
            'stock_min' => 10,
            'stock_max' => 100,
            'stock' => 50, // cant en almacen
            'user_id' => 1,
            'comercio_id' => 1,
            'category_id' => 2,
            'subcategory_id' => 10,
            'supplier_id' => 1, //proveedor
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('products')->insert([
            'code_lote' => 'A0002',
            'code' => 'A0002',
            'name' => 'ACEITE S',
            'description' => 'ACEITE DE MOTOR 15 40',
            'avatar' => 'aceite1.png',
            'brand_id' => 1, //marca
            'container_id' => 1, //envase
            'currency' => '$', //moneda
            'price1' => 3.4, //precio al detal
            'profit_price' => 12, // porcentaje de ganancia
            'price_mayor' => 3, //precio al mayor
            'profit_mayor' => 12, // porcentaje de ganancia
            'price_offer' => 3, //precio de oferta
            'profit_offer' => 12, // porcentaje de ganancia
            'price_divisa' => 41, //precio del dolar cuando se adquirió
            'delivery' => 'NO', // Si o No
            'stock_min' => 10,
            'stock_max' => 100,
            'stock' => 50, // cant en almacen
            'user_id' => 1,
            'comercio_id' => 1,
            'category_id' => 2,
            'subcategory_id' => 11,
            'supplier_id' => 1, //proveedor
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('products')->insert([
            'code_lote' => 'A0003',
            'code' => 'A0003',
            'name' => 'LIMPIADOR S',
            'description' => 'LIMPIA Y LIMPIA Y NO SE CANSA DE LIMPIAR',
            'avatar' => 'limpiador.png',
            'brand_id' => 2, //marca
            'container_id' => 1, 
            'currency' => '$', 
            'price1' => 3.4, 
            'profit_price' => 12, 
            'price_mayor' => 3, 
            'profit_mayor' => 12, 
            'price_offer' => 3, 
            'profit_offer' => 12, 
            'price_divisa' => 41, 
            'delivery' => 'NO', 
            'stock_min' => 10,
            'stock_max' => 100,
            'stock' => 50, 
            'user_id' => 1,
            'comercio_id' => 1,
            'category_id' => 3,
            'subcategory_id' => 1,
            'supplier_id' => 1, 
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('products')->insert([
            'code_lote' => 'A0004',
            'code' => 'A0004',
            'name' => 'EMPACADURA',
            'description' => 'EMPACADURA DURADERA DE LA MEJOR',
            'avatar' => 'empacadura.png',
            'brand_id' => 1, //marca
            'container_id' => 1,
            'currency' => '$', 
            'price1' => 5.4, 
            'profit_price' => 12, 
            'price_mayor' => 4, 
            'profit_mayor' => 12, 
            'price_offer' => 4, 
            'profit_offer' => 12, 
            'price_divisa' => 41, 
            'delivery' => 'NO', 
            'stock_min' => 10,
            'stock_max' => 100,
            'stock' => 50, 
            'user_id' => 1,
            'comercio_id' => 1,
            'category_id' => 4,
            'subcategory_id' => 1,
            'supplier_id' => 1, 
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);

        DB::table('products')->insert([
            'code_lote' => 'A0005',
            'code' => 'A0005',
            'name' => 'MOTOR EXPRES',
            'description' => 'MOTOR EXPRES NUEVO UN SOLO USO',
            'avatar' => 'motor.png',
            'brand_id' => 1, //marca
            'container_id' => 1,
            'currency' => '$', 
            'price1' => 205.4, 
            'profit_price' => 12, 
            'price_mayor' => 205.4, 
            'profit_mayor' => 12, 
            'price_offer' => 205.4, 
            'profit_offer' => 12, 
            'price_divisa' => 41, 
            'delivery' => 'NO', 
            'stock_min' => 10,
            'stock_max' => 1,
            'stock' => 50, 
            'user_id' => 1,
            'comercio_id' => 1,
            'category_id' => 5,
            'subcategory_id' => 1,
            'supplier_id' => 1, 
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);
    }
}
