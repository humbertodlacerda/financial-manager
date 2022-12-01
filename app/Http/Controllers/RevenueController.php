<?php

namespace App\Http\Controllers;

use App\Finance\Revenues\Services\RevenueService;

class RevenueController extends AbstractController
{
    public function __construct(RevenueService $service)
    {
        $this->service = $service;
    }
}
