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
         *     schema="offre_stage",
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

    public function up(): void
    {
        Schema::create('offre_stages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->integer('renumeration');
            $table->integer('places');
            $table->text("condotion_admin");
            $table->text('competences');
            $table->foreignId('id_ent')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreignId('id_typeStage')->references('id')->on('type_stages')->onDelete('cascade');
            $table->foreignId('id_sect')->references('id')->on('secteurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_stages');
    }
};
