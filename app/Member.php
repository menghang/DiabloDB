<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;
use Exception;
use DiabloDB\Character;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'battletag', 'paragon', 'paragon_hc', 'paragon_curr_season', 'paragon_curr_season_hc'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function getParagon($seasonal = null, $hardcore = null)
    {
        if (!isset($seasonal)) {
            if (isset($hardcore)) {
                return $this->paragon_hc;
            } else {
                return $this->paragon;
            }
        } else {
            if (isset($hardcore)) {
                return $this->paragon_curr_season_hc;
            } else {
                return $this->paragon_curr_season;
            }
        }
    }

    /**
     * Members characters
     */
    public function characters()
    {
        return $this->hasMany('Character');
    }
}
