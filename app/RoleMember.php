<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;

class RoleMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
