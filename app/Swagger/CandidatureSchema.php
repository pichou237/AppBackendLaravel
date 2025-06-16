<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Candidature",
 *     title="Candidature",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="status", type="string"),
 *     @OA\Property(property="matricule", type="string"),
 *     @OA\Property(property="date_offre", type="datetime"),
 * )
 */
class CandidatureSchema {}
