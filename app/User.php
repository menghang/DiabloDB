<?php

namespace DiabloDB;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Exception;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | ACL: Access Control Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Determine if the user is an administrator.
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('administrator');
    }

    /**
     * Determine if the user in a member.
     * @return bool
     */
    public function isMember()
    {
        return $this->hasRole('member');
    }

    /**
     * Determine if the given user has the requested role.
     *
     * @param string $name Role name.
     *
     * @return boolean
     */
    public function hasRole($name)
    {
        $role_id = Role::getRoleId($name);
        try {
            RoleMember::where('user_id', $this->id)->where('role_id', $role_id)->firstOrFail();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
