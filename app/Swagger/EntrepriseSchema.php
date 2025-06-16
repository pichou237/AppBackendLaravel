<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Entreprise",
 *     title="Entreprise",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="adresse", type="string"),
 *     @OA\Property(property="politique", type="text"),
 *     @OA\Property(property="description", type="text"),
 *     @OA\Property(property="ville", type="string"),
 * )
 */
class EntrepriseSchema {}
