<?php

use Dompdf\FrameDecorator\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Object mesurements
            $table->integer('A');
            $table->integer('B');
            $table->integer('C');
            $table->integer('afschot');
            $table->integer('length');
            $table->integer('ammount');
            // Finish
            $table->boolean('powdercoat');
            $table->string('RAL')->nullable();
            $table->boolean('matte');
            $table->boolean('fine');
            $table->boolean('seaside-prep');
            // Extra options
            $table->integer('kopschoten');
            $table->integer('anti-dreun');
            $table->boolean('koppelstukken');
            $table->boolean('ankers');
            $table->boolean('hoekstukken');
            // Image
            $table->string('image-name');
            $table->string('file-path');
            // Other
            $table->string('status');
            $table->string('notes');
            $table->timestamps();
            // Customer
            $table->unsignedBigInteger('customer-id');
            $table->foreign('customer-id')
                ->references('id')
                ->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
