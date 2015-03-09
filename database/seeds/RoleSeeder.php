<?php

use DiabloDB\Role;
use Illuminate\Database\Seeder;

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
