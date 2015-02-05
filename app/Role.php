<?php

namespace DiabloDB;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Role extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Helper function to get role id by name
     *
     * @param string $name Role name.
     *
     * @return boolean|integer Returns id or false.
     */
    public static function getRoleId($name)
    {
        try {
            $role = Role::where('name', $name)->firstOrFail();
            return $role->id;
        } catch (Exception $e) {
            return false;
        }
    }
}
