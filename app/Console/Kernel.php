<?php

namespace DiabloDB\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Config;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'DiabloDB\Console\Commands\RoleAssignCommand',
        'DiabloDB\Console\Commands\CharactersUpdateCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $validMethods = [
            'everyFiveMinutes', 'everyTenMinutes', 'everyThirtyMinutes',
            'hourly', 'daily', 'monthly', 'yearly'
        ];

        /* Update Members */
        $memberSchedule = \Config::get('diablo.schedule.members');
        if (in_array($memberSchedule, $validMethods)) {
            $schedule->command('MembersUpdateCommand')
                ->$memberSchedule();
        }

        /* Update Characters */
        $characterSchedule = \Config::get('diablo.schedule.characters');
        if (in_array($characterSchedule, $validMethods)) {
            $schedule->command('CharactersUpdateCommand')
                ->$characterSchedule();
        }

        //$schedule->command('inspire')
        //         ->hourly();
    }

}
