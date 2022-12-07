<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Expense;
use App\Jobs\DueReminderJob;
use App\Mail\DueReminderMail;
use Illuminate\Console\Command;

class AutoDueReminderCommand extends Command
{
    protected $email;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:dueremindercommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expenses = Expense::all();
        $today = Carbon::now()->toDate()->format('Y-m-d');
        
        foreach ($expenses as $expense) {
            $user = User::find($expense->user_id);

            $email = new DueReminderMail(
                $expense->description,
                $expense->value,
                $user->email
            );

            if ($expense->notification_date == $today && $expense->notification_status == 0) {
                DueReminderJob::dispatch($email);
                $expense->notification_status = 1;
                $expense->save();
            }
        }

        return Command::SUCCESS;
    }
}
