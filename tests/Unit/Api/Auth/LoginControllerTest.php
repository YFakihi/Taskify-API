<?php

namespace Tests\Unit\Api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login endpoint with valid credentials.
     *
     * @return void
     */
    public function testLoginWithValidCredentials()
    {

        $user = User::factory()->create([
            'password' => bcrypt($password = 'testpassword'),
        ]);

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure(['user', 'token']);
    }

    /**
     * Test login endpoint with invalid credentials.
     *
     * @return void
     */
    public function testLoginWithInvalidCredentials()
    {

        $response = $this->postJson('/api/auth/login', [
            'email' => 'invalid@example.com',
            'password' => 'invalidpassword',
        ]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['email']);
    }
}
