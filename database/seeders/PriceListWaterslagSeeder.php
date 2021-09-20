<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\PriceListWaterslag;

class PriceListWaterslagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_list_waterslags')->insert([
            'product' => 50,
            'poedercoat<10' => 85,
            'poedercoat>10' => 15,
            'kopschotten' => 7.5,
            'antiDreun' => 7.5,
            'koppelstukken' => 4,
            'ankers' => 5,
            'hoekstukken' => 5
        ]);
    }
}
