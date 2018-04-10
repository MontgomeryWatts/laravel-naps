<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('quietLevel');
            $table->text('notes')->nullable();

            $table->integer('status')->default(0); // Status: 0 - under review, 1 - public, 2 - designated

            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('spot_types');

            $table->float("lat");
            $table->float("lng");

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
        Schema::dropIfExists('spots');
    }
}
