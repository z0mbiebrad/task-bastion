<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\GuestTask;
use Illuminate\Console\Command;

class ResetTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets the users tasks every night';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Task::query()->update(['completed' => false]);
        GuestTask::query()->update(['completed' => false]);
        $this->info('All tasks have been reset successfully');
    }
}
