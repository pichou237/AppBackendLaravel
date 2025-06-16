<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="OffreStage",
 *     title="OffreStage",
 *     type="object",
 *     @OA\Property(property="title", type="string"),
 *     @OA\Property(property="description", type="text"),
 *     @OA\Property(property="date_debut", type="datetime"),
 *     @OA\Property(property="date_fin", type="datetime"),
 *     @OA\Property(property="renumeration", type="integer"),
 *     @OA\Property(property="places", type="integer"),
 *     @OA\Property(property="condition_admin", type="text"),
 *     @OA\Property(property="competences", type="text"),
 *      @OA\Property(property="id_ent", type="integer"),
 *     @OA\Property(property="id_typestage", type="integer"),
 *     @OA\Property(property="id_sect", type="integer"),
 * )
 */
class OffreStageSchema {}
