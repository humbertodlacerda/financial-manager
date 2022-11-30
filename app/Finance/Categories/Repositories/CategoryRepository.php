<?php

namespace App\Finance\Categories\Repositories;

use App\Finance\Abstracts\AbstractRepository;
use App\Finance\Categories\Entities\CategoryEntity;

class CategoryRepository extends AbstractRepository
{
    protected $model;

    public function __construct(CategoryEntity $model)
    {
        $this->model = $model;
    }
}
