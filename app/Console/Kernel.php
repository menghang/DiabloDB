<?php

namespace DiabloDB\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    public $updateFreqency = [
        'characters' => 'hourly',
        'members' => 'daily'
    ];

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'DiabloDB\Console\Commands\RoleAssignCommand',
        'DiabloDB\Console\Commands\CharactersUpdateCommand',
        'DiabloDB\Console\Commands\MembersUpdateCommand',
        'DiabloDB\Console\Commands\CharacterUpdateCommand',
        'DiabloDB\Console\Commands\MemberUpdateCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $validMethods = [
            'everyFiveMinutes', 'everyTenMinutes', 'everyThirtyMinutes',
            'hourly', 'daily', 'monthly', 'yearly'
        ];

        /* Update Members */
        $memberSchedule = $this->updateFreqency['members'];
        if (in_array($memberSchedule, $validMethods)) {
            $schedule->command('MembersUpdateCommand')
                ->$memberSchedule();
        }

        /* Update Characters */
        $characterSchedule = $this->updateFreqency['characters'];
        if (in_array($characterSchedule, $validMethods)) {
            $schedule->command('CharactersUpdateCommand')
                ->$characterSchedule();
        }
    }
}
