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
         *     schema="entreprises",
         *     @OA\Property(property="id", type="integer"),
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="adresse", type="string"),
         *     @OA\Property(property="politique", type="text"),
         *     @OA\Property(property="description", type="text"),
         *     @OA\Property(property="ville", type="string"),
         * )
     */

    public function up(): void
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('adresse');
            $table->text('politique');
            $table->text('description');
            $table->string('ville');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
