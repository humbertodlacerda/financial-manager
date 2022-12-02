<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * Undocumented function
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->category = Category::factory()->make()->toArray();
    }
    
    public function test_create_category()
    {
        $this->post('/category', [$this->category])->assertStatus(200);
    }
}
