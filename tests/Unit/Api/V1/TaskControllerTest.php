<?php

namespace Tests\Unit\Api\v2;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class TaskControllerV2Test extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a new task in API version 2.
     *
     * @return void
     */
    public function testCreateNewTaskV2()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->postJson('/api/v2/tasks', [
            'name' => 'New Task',
            'is_completed' => false,
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('tasks', [
            'name' => 'New Task',
            'is_completed' => false,
        ]);
    }

    /**
     * Test updating a task in API version 2.
     *
     * @return void
     */
    public function testUpdateTaskV2()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->putJson("/api/v2/tasks/{$task->id}", [
            'name' => 'Updated Task',
        ]);

        $response->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'name' => 'Updated Task',
        ]);
    }


    /**
     * Test deleting a task in API version 2.
     *
     * @return void
     */
    public function testDeleteTaskV2()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->deleteJson("/api/v2/tasks/{$task->id}");

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}