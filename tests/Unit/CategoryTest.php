<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Finance\Categories\Entities\CategoryEntity;
use App\Finance\Categories\Services\CategoryService;
use App\Finance\Categories\Repositories\CategoryRepository;

class CategoryTest extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

        $this->categoryRepository = new CategoryRepository(new CategoryEntity);
        $this->categoryService = new CategoryService($this->categoryRepository);

        $this->category = ['description' => fake()->name];

    }
    public function test_se_consigo_criar_uma_categoria()
    {
        $this->categoryService->save($this->category);

        $this->assertDatabaseHas('categories', $this->category);
    }
}
