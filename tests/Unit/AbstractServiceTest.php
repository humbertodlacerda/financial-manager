<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Finance\Categories\Entities\CategoryEntity;
use App\Finance\Categories\Services\CategoryService;
use App\Finance\Categories\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AbstractServiceTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->repository = new CategoryRepository(new CategoryEntity);
        $this->service = new CategoryService($this->repository);

        $this->category = Category::factory()->make();
        $this->data = $this->category->toArray();
    }

    public function test_save_method()
    {
        $this->service->save($this->data);

        $this->assertDatabaseHas('categories', $this->data);
    }

    public function test_find_method()
    {    
        $category = $this->service->save($this->data);

        $find = $this->service->find($category->id);

        $this->assertEquals($category->toArray(), $find->toArray());
    }
}
