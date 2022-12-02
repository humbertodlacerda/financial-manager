<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevenueStoreRequest;
use App\Finance\Revenues\Services\RevenueService;

class RevenueController extends AbstractController
{
    protected $requestValidate = RevenueStoreRequest::class;
    
    public function __construct(RevenueService $service)
    {
        $this->service = $service;
    }
}
