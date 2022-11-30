<?php

namespace App\Http\Controllers;

use App\Finance\Categories\Services\CategoryService;

class CategoryController extends AbstractController
{
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
}
