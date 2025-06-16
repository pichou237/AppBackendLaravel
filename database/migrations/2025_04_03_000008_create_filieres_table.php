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
         *     schema="filieres",
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="description", type="text"),
         *     @OA\Property(property="id_etab", type="integer"),
         *     @OA\Property(property="id_niveau", type="integer"),
         * )
     */


    public function up(): void
    {

        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('id_etab')->references('id')->on('etablissements')->onDelete('cascade');
            $table->foreignId('id_niveau')->references('id')->on('niveauses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};
