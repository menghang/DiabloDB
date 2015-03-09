<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('level');
            $table->integer('class');
            $table->string('diablo_id');
            $table->integer('hardcore')->default(0);
            $table->integer('season')->default(0);
            $table->integer('owner_id')->default(0);
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
        Schema::drop('characters');
    }
}
