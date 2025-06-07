<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\User;
use Illuminate\Console\Command;

class AssignTasksToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:assign-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign all tasks without a user to the first user in the database';

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
        $user = User::first();
        
        if (!$user) {
            $this->error('No users found in the database');
            return 1;
        }
        
        $count = Task::whereNull('user_id')->update(['user_id' => $user->id]);
        
        $this->info("Updated {$count} tasks with user ID: {$user->id}");
        
        return 0;
    }
}
