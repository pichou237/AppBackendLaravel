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
         *     schema="Candidatures",
         *     @OA\Property(property="status", type="string"),
         *     @OA\Property(property="matricule", type="string"),
         *     @OA\Property(property="date_offre", type="datetime"),
         * )
     */

    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_depot');
            $table->string('status');
            $table->string('matricule');
            $table->foreign('matricule')->references('matricule')->on('etudiants')->onDelete('cascade');
            $table->foreignId('id_offre')->references('id')->on('offre_stages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
