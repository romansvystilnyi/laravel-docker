<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="Laravel Swagger API documentation",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="admin@localhost"
 *     )
 * )
 * @OA\Tag(
 *     name="Library",
 *     description="Displaying a list of books in the form of a table, adding, editing and deleting",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://localhost:8088/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="X-APP-ID",
 *     securityScheme="X-APP-ID"
 * )
 */
class Controller extends BaseController
{
    //
}
