<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Finance\Categories\Entities\CategoryEntity;
use App\Finance\Categories\Services\CategoryService;
use App\Finance\Categories\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->repository = new CategoryRepository(new CategoryEntity);
        $this->service = new CategoryService($this->repository);

        $this->category = Category::factory()->make();
    }

    public function test_a()
    {
        $data = $this->category->toArray();
        
        $this->service->save($data);

        $this->assertDatabaseHas('categories', $data);
    }
}
