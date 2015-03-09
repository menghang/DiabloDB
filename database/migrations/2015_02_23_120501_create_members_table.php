<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('battletag');
            $table->integer('paragon')->default(0);
            $table->integer('paragon_hc')->default(0);
            $table->integer('paragon_curr_season')->default(0);
            $table->integer('paragon_curr_season_hc')->default(0);
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
        Schema::drop('members');
    }
}
