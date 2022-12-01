<?php

namespace App\Finance\Revenues\Repositories;

use App\Finance\Abstracts\AbstractRepository;
use App\Finance\Revenues\Entities\RevenueEntity;

class RevenueRepository extends AbstractRepository
{
    protected $model;

    public function __construct(RevenueEntity $model)
    {
        $this->model = $model;
    }
}
