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
    protected $fillable = ['name', 'battletag'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Members characters
     */
    public function characters()
    {
        return $this->hasMany('Character');
    }
}
