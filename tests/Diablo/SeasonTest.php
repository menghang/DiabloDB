<?php

use DiabloDB\Diablo\Season;

class SeasonTest extends TestCase
{
    public $season;

    public function setUp()
    {
        $this->season = new Season();
    }

    public function test_get_season_returns_correct_season()
    {
        $current_season = 3;
        $season = $this->season->getSeason();
        $this->assertEquals($current_season, $season);
    }
}
