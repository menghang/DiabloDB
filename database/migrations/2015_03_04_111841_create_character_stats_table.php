<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('character_stats', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('character_id');
            $table->integer('elite_kills')->default(0);
            $table->integer('life')->default(0);
            $table->integer('damage')->default(0);
            $table->integer('toughness')->default(0);
            $table->integer('healing')->default(0);
            $table->integer('attack_speed')->default(0);
            $table->integer('armor')->default(0);
            $table->integer('strength')->default(0);
            $table->integer('dexterity')->default(0);
            $table->integer('vitality')->default(0);
            $table->integer('intelligence')->default(0);
            $table->integer('resist_physical')->default(0);
            $table->integer('resist_fire')->default(0);
            $table->integer('resist_cold')->default(0);
            $table->integer('resist_lightning')->default(0);
            $table->integer('resist_poison')->default(0);
            $table->integer('resist_arcane')->default(0);
            $table->integer('crit_damage')->default(0);
            $table->integer('block_chance')->default(0);
            $table->integer('block_min')->default(0);
            $table->integer('block_max')->default(0);
            $table->integer('damage_increase')->default(0);
            $table->integer('crit_chance')->default(0);
            $table->integer('damage_reduction')->default(0);
            $table->integer('thorns')->default(0);
            $table->integer('life_steal')->default(0);
            $table->integer('life_per_kill')->default(0);
            $table->integer('gold_find')->default(0);
            $table->integer('magic_find')->default(0);
            $table->integer('life_on_hit')->default(0);
            $table->integer('primary_resource')->default(0);
            $table->integer('secondary_resource')->default(0);
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
        Schema::drop('character_stats');
	}

}
