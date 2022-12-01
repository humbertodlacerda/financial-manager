<?php

namespace App\Finance\Revenues\Services;

use App\Finance\Abstracts\AbstractService;
use App\Finance\Revenues\Repositories\RevenueRepository;

class RevenueService extends AbstractService
{
    public function __construct(RevenueRepository $repository)
    {
        $this->repository = $repository;    
    }
}
