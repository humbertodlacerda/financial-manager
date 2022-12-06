<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->user = User::factory()->create();
        $this->category = Category::factory()
            ->for($this->user)
            ->make();
    }

    public function test_index_category()
    {
        $this->actingAs($this->user);

        $this->post('/api/category', $this->category->toArray());

        $expected = $this->category->description;

        $this->get('/api/category')->assertSee($expected);
    }
    
    public function test_store_category()
    {
        $this->actingAs($this->user);
        
        $this->post('/api/category', $this->category->toArray())->assertStatus(200);
        $this->assertDatabaseHas('categories', $this->category->toArray());
    }

    public function test_show_category()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/category', $this->category->toArray());
        $id = json_decode($response->content(), true)['id'];

        $expected = $this->category->description;

        $this->get('/api/category/' . $id)->assertSee($expected);
    }

    public function test_update_category()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/category', $this->category->toArray());
        $id = json_decode($response->content(), true)['id'];

        $expected = ['description' => 'category updated'];
        
        $this->put('/api/category/' . $id, $expected)->assertStatus(200);
        $this->get('/api/category/' . $id)->assertSee($expected);
    }

    public function test_delete_category()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/category', $this->category->toArray());
        $id = json_decode($response->content(), true)['id'];
        
        $this->delete('/api/category/' . $id)->assertStatus(200);
        $this->assertDatabaseCount('categories', 0);
    }
}
