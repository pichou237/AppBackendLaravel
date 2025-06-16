<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TypeStage",
 *     title="TypeStage",
 *     type="object",
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="durre", type="dateTime"),
 *     @OA\Property(property="description", type="text"),
 * )
 */
class TypeStageSchema {}
