<?php

namespace DiabloDB\Console\Commands;

use Illuminate\Console\Command;
use DiabloDB\Character;
use DiabloDB\Commands\CharacterUpdate;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CharactersUpdateCommand extends Command
{
    /**
    * The console command name.
    *
    * @var string
    */
    protected $name = 'characters:update';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Updates community members character lists';

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
        $characters = Character::all();

        foreach ($characters as $char)
        {
            $member = $char->member;
            $command = new CharacterUpdate($char, $member);
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
