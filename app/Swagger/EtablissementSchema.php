<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
         * @OA\Schema(
         *    schema="Etablissement",
         *    title="Etablissement",
         *    type="object",
         *    @OA\Property(property="name", type="string"),
         *    @OA\Property(property="type_etab", type="string"),
         *    @OA\Property(property="ville", type="text"),
         *    @OA\Property(property="contact", type="string"),
         *    @OA\Property(property="email", type="string"),
 * )
 */
class EtablissementSchema {}
