<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RevenueCrudTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->category = Category::factory()->create();
        $this->revenue = Revenue::factory()
            ->recycle([$this->user, $this->category])
            ->make();
    }

    public function test_index_revenue()
    {
        $this->actingAs($this->user);
        
        $this->post('/api/revenue', $this->revenue->toArray());

        $this->get('/api/revenue')->assertSee($this->revenue->description);
    }

    public function test_store_revenue()
    {
        $this->actingAs($this->user);
        
        $this->post('/api/revenue', $this->revenue->toArray())
            ->assertStatus(200);
        $this->assertDatabaseHas('revenues', $this->revenue->toArray());
    }

    public function test_show_revenue()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/revenue', $this->revenue->toArray());
        $id = json_decode($response->content(), true)['id'];

        $this->get('/api/revenue/' . $id)
        ->assertSee($this->revenue->description);
    }

    public function test_update_revenue()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/revenue', $this->revenue->toArray());
        $id = json_decode($response->content(), true)['id'];

        $expected = ['description' => 'revenue updated'];

        $this->put('/api/revenue/' . $id, $expected)->assertStatus(200);
        $this->get('/api/revenue')->assertSee($expected);
    }

    public function test_delete_revenue()
    {
        $this->actingAs($this->user);
        
        $response = $this->post('/api/revenue', $this->revenue->toArray());
        $id = json_decode($response->content(), true)['id'];

        $this->delete('/api/revenue/' . $id)->assertStatus(200);
        $this->assertDatabaseCount('revenues', 0);
    }
}
