<?php

use DiabloDB\Member;

class MemberTest extends TestCase
{
    public function test_get_paragon_gets_correct_regular_paragon_level()
    {
        $member = new Member();
        $member->paragon = 20;
        $paragon = $member->getParagon();

        $this->assertEquals(20, $paragon);
    }

    public function test_get_paragon_gets_correct_hardcore_paragon_level()
    {
        $member = new Member();
        $member->paragon_hc = 30;
        $hc_paragon = $member->getParagon(null, true);

        $this->assertEquals(30, $hc_paragon);
    }

    public function test_get_paragon_gets_correct_seasonal_paragon_level()
    {
        $member = new Member();
        $member->paragon_curr_season = 40;
        $paragon = $member->getParagon(true);

        $this->assertEquals(40, $paragon);
    }

    public function test_get_paragon_gets_correct_seasonal_hardcore_paragon_level()
    {
        $member = new Member();
        $member->paragon_curr_season_hc = 50;
        $paragon = $member->getParagon(true, true);

        $this->assertEquals(50, $paragon);
    }
}
