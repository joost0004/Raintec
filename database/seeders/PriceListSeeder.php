<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PriceList;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_lists')->insert([
            'product' => 50,
            'poedercoat' => 85,
            'poedercoat10' => 15,
            'kopschotten' => 7.5,
            'antiDreun' => 7.5,
            'koppelstukken' => 4,
            'ankers' => 5,
            'hoekstukken' => 5
        ]);
    }
}
