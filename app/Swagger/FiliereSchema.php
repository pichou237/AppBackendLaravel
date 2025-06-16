<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Filiere",
 *     title="Filiere",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="text"),
 *     @OA\Property(property="id_etab", type="integer"),
 *     @OA\Property(property="id_niveau", type="integer"),
 * )
 */
class FiliereSchema {}
