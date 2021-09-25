<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('product');
            $table->integer('poedercoat');
            $table->integer('poedercoat10');
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
        Schema::dropIfExists('price_lists');
    }
}
