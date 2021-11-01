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
            $table->json('A');
            $table->json('B');
            $table->json('C');
            $table->json('afschot');
            $table->json('length');
            $table->json('amount');
            // Finish
            $table->boolean('powdercoat')->default(false);
            $table->string('RAL')->nullable();
            $table->boolean('matte')->default(false);
            $table->boolean('fine')->default(false);
            $table->boolean('seasidePrep')->default(false);
            // Extra options
            $table->integer('kopschotten')->default(0);
            $table->integer('antiDreun');
            $table->boolean('koppelstukken')->default(false);
            $table->boolean('ankers')->default(false);
            $table->boolean('hoekstukken')->default(false);
            // Image
            $table->string('imageName')->nullable();
            // Other
            $table->string('status')->default("Afwachtend");
            $table->string('notes')->nullable();
            $table->timestamps();
            // Customer
            $table->foreignId('customerId')->constrained('customers');
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
