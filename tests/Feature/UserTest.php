<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->make();

        $this->payload = [
            'name' => $this->user->name,
            'email' => $this->user->email,
            'password' => Hash::make('password')
        ];
    }

    public function test_register_user()
    {
        $this->post('/api/auth/register', $this->payload)->assertStatus(201);
    }

    public function test_login_user()
    {
        $this->post('/api/auth/register', $this->payload);

        $this->post('/api/auth/login', $this->payload)->assertStatus(200);
        $this->assertAuthenticated();
    }

    public function test_logout()
    {
        $this->post('/api/auth/register', $this->payload);
        $this->post('/api/auth/login', $this->payload);

        $this->post('/api/auth/logout')->assertStatus(200);
        $this->assertAuthenticated(false);
    }
}
