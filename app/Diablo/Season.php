<?php

class Season
{
    public $seasons = [
        0 => ['from' => '2012-05-15', 'to' => '2014-08-28'],
        1 => ['from' => '2014-08-29', 'to' => '2015-02-03'],
        2 => [
            'from' => '2015-02-13',
            'to' => '2015-07-21' // NOTE: If S2 lasts same time as S1 then forcasted date would be 2015-07-21, using as placeholder
        ]
    ];

    public function getSeasonFromDate($date)
    {

    }

    public function getCurrentSeason()
    {
        return 2; // TODO: Consider value in grabbing this dynamically rather than via app updates.
    }
}