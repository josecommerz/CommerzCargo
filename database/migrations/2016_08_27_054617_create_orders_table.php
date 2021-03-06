<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('originState');
            $table->string('originCity');
            $table->string('originCargoService');

            $table->string('destinationState');
            $table->string('destinationCity');
            $table->string('destinationCargoService');

            $table->dateTime('dueDate');
            $table->string('transportationType');
            $table->string('vehicleType');
            $table->string('sendType');

            $table->string('orderStatus')->default('pendiente');

            $table->string('cargoType');

            $table->string('packageType');
            $table->double('packageNumber');
            $table->double('packageWeight');
            $table->double('packageVolume');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('orders');
    }
}
