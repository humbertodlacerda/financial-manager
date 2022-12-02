<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseStoreRequest;
use App\Finance\Expenses\Services\ExpenseService;

class ExpenseController extends AbstractController
{
    protected $requestValidate = ExpenseStoreRequest::class;

    public function __construct(ExpenseService $service)
    {
        $this->service = $service;
    }
}
