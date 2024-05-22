<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * 
     * 
     * Register the commands for the application.
     */


    protected function schedule(Schedule $schedule)
    {
        $schedule->command('matches:update-results')->daily();
    }
    
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }



    protected $commands = [
        \App\Console\Commands\UpdateMatchResults::class,
    ];



}
