<?php

namespace Tests\Unit\Api\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test register endpoint with valid data.
     *
     * @return void
     */
    public function testRegisterWithValidData()
    {

        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure(['user', 'token']);
    }

    /**
     * Test register endpoint with invalid data.
     *
     * @return void
     */
    public function testRegisterWithInvalidData()
    {

        $response = $this->postJson('/api/auth/register', [
            'name' => 'Test User',
            'email' => 'invalidemail',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
        ]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['email']);
    }
}