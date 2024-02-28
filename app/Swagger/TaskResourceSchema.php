<?php

namespace App\Swagger;

/**
  * @OA\Schema(
 *     schema="TaskResource",
 *     title="Task Resource",
 *     description="Task resource schema",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID of the task"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Title of the task"
 *     ),
 *     @OA\Property(
 *         property="is_completed",
 *         type="boolean",
 *         description="Indicates whether the task is completed or not"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Date and time when the task was created"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Date and time when the task was last updated"
 *     )
 * )
 */
class TaskResourceSchema
{
    //
}