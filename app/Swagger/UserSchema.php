<?php

namespace App\Swagger;

/**
 * @OA\Schema(
 *     schema="User",
 *     required={"id", "name", "email"}
 * )
 */
class UserSchema
{
    /**
     * @OA\Property(
     *     property="id",
     *     type="integer",
     *     format="int64",
     *     description="User ID"
     * )
     *
     * @var int
     */
    public $id;

    /**
     * @OA\Property(
     *     property="name",
     *     type="string",
     *     description="User's name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     property="email",
     *     type="string",
     *     format="email",
     *     description="User's email"
     * )
     *
     * @var string
     */
    public $email;
}