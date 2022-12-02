<?php

namespace App\Http\Controllers;

use App\Finance\Categories\Services\CategoryService;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends AbstractController
{
    protected $requestValidate = CategoryStoreRequest::class;
    
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
}
