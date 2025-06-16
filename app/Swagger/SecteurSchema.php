<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Secteur",
 *     title="Secteur",
 *     type="object",
*     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="label", type="string"),
 * )
 */
class secteurSchema {}
