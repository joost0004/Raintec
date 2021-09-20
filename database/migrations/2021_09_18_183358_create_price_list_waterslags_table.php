<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListWaterslagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_list_waterslags', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('poedercoat<10');
            $table->integer('poedercoat>10');
            $table->integer('kopschotten');
            $table->integer('antiDreun');
            $table->integer('koppelstukken');
            $table->integer('ankers');
            $table->integer('hoekstukken');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_list_waterslags');
    }
}
