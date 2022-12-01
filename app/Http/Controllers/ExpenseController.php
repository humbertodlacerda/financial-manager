<?php

namespace App\Http\Controllers;

use App\Finance\Expenses\Services\ExpenseService;

class ExpenseController extends AbstractController
{
    public function __construct(ExpenseService $service)
    {
        $this->service = $service;
    }
}
