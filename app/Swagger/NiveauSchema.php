<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Niveau",
 *     title="Niveau",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="label", type="string"),
 * )
 */
class NiveauSchema {}
