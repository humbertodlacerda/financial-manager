<?php

namespace App\Finance\Expenses\Repositories;

use App\Finance\Abstracts\AbstractRepository;
use App\Finance\Expenses\Entities\ExpenseEntity;

class ExpenseRepository extends AbstractRepository
{
    protected $model;

    public function __construct(ExpenseEntity $model)
    {
        $this->model = $model;
    }
}
