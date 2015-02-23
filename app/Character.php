<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;
use Exception;
use DiabloDB\Member;

/**
 * Class Character
 * @package DiabloDB
 */
class Character extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'characters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'level'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function member()
    {
        return $this->belongsTo('Member');
    }
}
