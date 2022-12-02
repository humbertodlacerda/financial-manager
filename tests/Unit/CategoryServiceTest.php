<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Finance\Categories\Entities\CategoryEntity;
use App\Finance\Categories\Services\CategoryService;
use App\Finance\Categories\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryServiceTest extends TestCase
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
        $this->assertDatabaseHas('categories', $find->toArray());

    }

    public function test_update_method()
    {
        $category = $this->service->save($this->data);
        $expected = ['description' => fake()->name];

        $update = $this->service->update($expected, $category->id);

        $this->assertTrue($update);
    }

    public function test_delet_method()
    {
        $category = $this->service->save($this->data);

        $delete = $this->service->delete($category->id);

        $this->assertTrue($delete);
        $this->assertDatabaseMissing('categories', $category->toArray());
    }
}
