<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('typeId');
            $table->integer('categoryId');
            $table->integer('stateId');
            $table->int('featured');
            $table->string('name');
            $table->string('location');
            $table->string('keywords');
            $table->string('description');
            $table->string('slug');
            $table->string('uri');
            $table->float('price');
            $table->string('banner');
            $table->string('status');
            $table->string('token');
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
        Schema::dropIfExists('properties');
    }
}
