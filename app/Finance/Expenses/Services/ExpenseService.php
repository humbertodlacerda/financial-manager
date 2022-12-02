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
        $dataValidate = Carbon::parse($data['date'])
            ->toDate()
            ->format('Y-m-d');
        
        $today = Carbon::now()->toDate()
            ->format('Y-m-d');
        
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        if ($dataValidate < $today || $dataValidate > $endOfMonth) {
            return new \Exception('Data inserida é inválida.');
        }
        
        return $data;
    }
}
