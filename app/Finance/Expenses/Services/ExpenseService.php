<?php

namespace App\Finance\Expenses\Services;

use App\Finance\Abstracts\AbstractService;
use App\Finance\Expenses\Repositories\ExpenseRepository;

class ExpenseService extends AbstractService
{
    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }
}
