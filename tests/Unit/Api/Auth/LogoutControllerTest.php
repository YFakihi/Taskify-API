<?php

namespace Tests\Unit\Api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

class LogoutControllerTest extends TestCase
{
    /**
     * Test logout endpoint.
     *
     * @return void
     */
    public function testLogout()
    {
        // Create a user
        $user = User::factory()->create();

        // Authenticate the user
        Sanctum::actingAs($user);

        // Make a POST request to logout
        $response = $this->postJson('/api/auth/logout');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the access token has been deleted
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'tokenable_type' => get_class($user)
        ]);
    }


}