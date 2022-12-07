<?php

namespace App\Finance\Expenses\Services;

use Carbon\Carbon;
use App\Finance\Abstracts\AbstractService;
use App\Finance\Expenses\Repositories\ExpenseRepository;

class ExpenseService extends AbstractService
{
    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function beforeSave(array $data)
    {
        $subDay = Carbon::parse($data['date'])->subDay(1)->format('Y-m-d');

        $data['notification_date']  = $subDay;

        return $data;
    }
}
