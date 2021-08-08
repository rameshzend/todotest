<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\TaskSchedulerController;

class ReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:todo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send todo task reminders';

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
     * @return int
     */
    public function handle()
    {
        $scheduler = new TaskSchedulerController();
        $scheduler->getScheduledReminders();
        
        return 0;
    }
}
