<?php

namespace DiabloDB\Diablo;

use \DateTime;

/**
 * Class Season
 *
 * @package DiabloDB\Diablo
 */
class Season
{
    /** @var array $seasons A list of known seasons. */
    public $seasons = [
        0 => [ 'from' => '2012-05-15', 'to' => '2014-08-28' ],
        1 => [ 'from' => '2014-08-29', 'to' => '2015-02-03' ],
        2 => [ 'from' => '2015-02-13', 'to' => '2015-04-05' ],
        3 => [ 'from' => '2015-04-10', 'to' => '2016-01-01'], // Placeholder end date for S3.
    ];

    /**
     * Get season by date or current.
     *
     * @param string|null $date Date to check (optional).
     *
     * @return int|null Returns the season id.
     */
    public function getSeason($date = null)
    {
        if ($date == null) {
            return $this->getCurrentSeason();
        }

        $date = new DateTime($date);

        foreach ($this->seasons as $i => $season) {
            $to = new DateTime($season['to']);
            if ($to >= $date) {
                return $i;
            }
        }
        return null;
    }

    /**
     * Get the current season id.
     *
     * @return int $season Season Number.
     *
     * @todo Consider value in grabbing this dynamically rather than via app updates.
     */
    private function getCurrentSeason()
    {
        return 2;
    }
}
