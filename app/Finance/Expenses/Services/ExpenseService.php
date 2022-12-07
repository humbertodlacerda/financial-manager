<?php

namespace App\Finance\Expenses\Services;

use Carbon\Carbon;
use App\Finance\Abstracts\AbstractService;
use App\Finance\Expenses\Repositories\ExpenseRepository;
use App\Jobs\DueReminderJob;
use App\Mail\DueReminderMail;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExpenseService extends AbstractService
{
    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeSave(array $data)
    {
        $dataValidate = Carbon::parse($data['date'])
            ->toDate()
            ->format('Y-m-d');
        
        $today = Carbon::now()->toDate()
            ->format('Y-m-d');
        
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        if ($dataValidate < $today || $dataValidate > $endOfMonth) {
            return new \Exception('Data inserida é inválida.');
        }

        $subDay = Carbon::parse($data['date'])->subDay(1)->format('Y-m-d');

        $data['notification_date']  = $subDay;

        return $data;
    }

    // public function afterSave($entity)
    // {
    //     $email = new DueReminderMail(
    //         $entity->description,
    //         $entity->value,
    //         Auth::user()->email,
    //     );
        
    //     $today = Carbon::now()->toDate()->format('Y-m-d');
        
    //     if ($entity->notification_date == $today) {
    //         DueReminderJob::dispatch($email);
    //     }

    //     return $entity;
    // }
}
