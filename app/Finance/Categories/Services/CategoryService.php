<?php

namespace App\Finance\Categories\Services;

use Carbon\Carbon;
use App\Finance\Abstracts\AbstractService;
use App\Finance\Categories\Repositories\CategoryRepository;

class CategoryService extends AbstractService
{
    protected $repository;
    
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }
}
