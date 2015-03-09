<?php

namespace DiabloDB\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DiabloDB\User;
use DiabloDB\Role;
use DiabloDB\RoleMember;

class RoleAssignCommand extends Command
{
    /** @var string $name The console command name. */
    protected $name = 'role:assign';

    /** @var string $description The console command description. */
    protected $description = 'Assign users to a role - required for initial install.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        try {
            $user_id = $this->getUserId();
        } catch (Exception $e) {
            return $this->line("Error user specified is invalid");
        }

        try {
            $role_id = $this->getRoleId();
        } catch (Exception $e) {
            return $this->line("Error user specified is invalid");
        }

        try {
            RoleMember::create(['user_id' => $user_id, 'role_id' => $role_id]);
        } catch (Exception $e) {
            \Log::debug($e->getMessage());
            $this->line("Unable to add user to role");
        }

        /* Get list of roles */
        $this->line("User {$user_id} added to role {$role_id}");
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            //['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

    /**
     * Builds the userlist into an array suitable for tabular output.
     *
     * @param \Illuminate\Database\Eloquent\Collection $users
     *
     * @return array
     */
    public function buildUserTable($users)
    {
        $user_data = [];
        foreach ($users as $user) {
            $user_data[] = [$user->id, $user->name];
        }
        return $user_data;
    }

    /**
     * Get the user id.
     * @return integer
     */
    public function getUserId()
    {
        /* Get list of users */
        $users = User::all();
        $userData = $this->buildUserTable($users);
        $this->table(['id', 'username'], $userData);

        $user_id = $this->ask('Which user would you like to assign a role for? [1,2,...]');

        return (int)$user_id;
    }

    /**
     * Build Roles table.
     * @param \Illuminate\Database\Eloquent\Collection $roles
     * @return array
     */
    public function buildRoleTable($roles)
    {
        $role_data = [];
        foreach ($roles as $r) {
            $role_data[] = [$r->id, $r->name];
        }
        return $role_data;
    }

    /**
     * Get the role id
     * @return string $role_id
     */
    public function getRoleId()
    {
        $roles = Role::all();
        $roleData = $this->buildRoleTable($roles);
        $this->table(['id', 'role'], $roleData);

        $role_id = $this->ask('Which role would you like to assign to the user? [1,2,...]');
        return $role_id;
    }
}
