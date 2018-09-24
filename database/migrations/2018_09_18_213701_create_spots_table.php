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

            $table->float('lat');
            $table->float('lng');
            $table->string('building');
            $table->integer('floor');

            $table->text('notes');
            $table->string('name');
            $table->boolean('approved');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types');

            $table->integer('classification_id')->unsigned()->nullable();
            $table->foreign('classification_id')->references('id')->on('classifications');

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
