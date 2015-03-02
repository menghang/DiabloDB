<?php

namespace DiabloDB\Console\Commands;

use DiabloDB\Character;
use DiabloDB\Commands\MemberUpdate;
use DiabloDB\Member;
use Illuminate\Console\Command;
use DiabloDB\Battlenet\Api;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DiabloDB\Commands\CharacterUpdate;

/**
 * Class MembersUpdateCommand
 *
 * Using members' battletags this class will get each members character listing.
 *
 * @package DiabloDB\Console\Commands
 */
class MembersUpdateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'members:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates community members.';

    /**
     * Create a new command instance.
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
        $members = Member::all();

        foreach ($members as $member) {
            $command = new MemberUpdate($member);
            $command->handle();
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
        ];
    }
}
