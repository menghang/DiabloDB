<?php

use DiabloDB\Role;

class RoleSeeder extends Seeder
{
    public $roles = ['Administrator', 'Member'];

    public function run()
    {
        foreach ($this->roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}