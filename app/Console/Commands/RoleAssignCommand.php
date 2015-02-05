<?php

namespace DiabloDB\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DiabloDB\User;

class RoleAssignCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'role:assign';

    /**
     * The console command description.
     *
     * @var string
     */
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
        /* Get list of users */
        $users = User::all();
        $userData = $this->buildUserTable($users);
        $this->table(['id', 'username'], $userData);

        /* Get list of roles */
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

    public function buildUserTable($users)
    {
        $user_data = [];
        foreach($users as $user)
        {
            $user_data[] = [$user->id, $user->name];
        }
        return $user_data;
    }
}
