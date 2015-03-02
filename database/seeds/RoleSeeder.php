<?php

use DiabloDB\Role;

class RoleSeeder
{
    public $roles = ['Administrator', 'Member'];

    public function run()
    {
        foreach ($this->roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}