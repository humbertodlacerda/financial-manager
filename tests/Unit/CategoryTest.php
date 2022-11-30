<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    public function setUp():void
    {
        parent::setUp();

    }
    public function test_se_consigo_criar_uma_categoria()
    {
        $data = [
            'description' => fake()->name
        ];

        $response = Category::create($data);

        $this->assertDatabaseHas('categories', $data);


    }
}
