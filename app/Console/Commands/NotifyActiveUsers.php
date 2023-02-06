<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NotifyUser;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

class NotifyActiveUsers extends Command
{
    use Notifiable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notifyActiveUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command notifies users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('is_active', true)->get();
        foreach ($users as $user) {
            $user->notify(new NotifyUser);
        }
        // User::whereDate('created_at', now()->subDays(1))
        //     ->get()->each(function ($user) {
        //         $user->notify(new NotifyUser);
        //     });

        Log::info('Job Done');


        // return Command::SUCCESS;
    }
}
