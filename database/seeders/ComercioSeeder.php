<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comercios')->insert([
            'area_id' => '2',
            'user_id' => '1',
            'keyword' => 'pagoexpres',
            'name' => 'PagoExpres',
            'created_at' => '2022-05-16 12:20:36',
            'updated_at' => '2022-05-16 12:20:36'
        ]);
    }
}
