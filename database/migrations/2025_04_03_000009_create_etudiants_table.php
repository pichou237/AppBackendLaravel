<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     /**
         * @OA\Schema(
         *     schema="Etudiants",
         *     @OA\Property(property="matricule", type="string"),
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="lastName", type="string"),
         *     @OA\Property(property="contact", type="string"),
         *     @OA\Property(property="date", type="datetime"),
         *     @OA\Property(property="sexe", type="char"),
         *     @OA\Property(property="adresse", type="text"),
         *     @OA\Property(property="photo", type="text"),
         *     @OA\Property(property="cv", type="text"),
         *     @OA\Property(property="id_fil", type="integer"),
         * )
     */

    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->string("matricule")->primary();
            $table->string('name');
            $table->string('lastName');
            $table->string('contact');
            $table->dateTime('date');
            $table->string('sexe');
            $table->text('adresse');
            $table->text('photo');
            $table->text('cv');
            $table->foreignId('id_fil')->references('id')->on('filieres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
