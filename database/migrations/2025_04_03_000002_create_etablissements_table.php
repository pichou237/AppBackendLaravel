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
         *     schema="etablissements",
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="type_etab", type="string"),
         *     @OA\Property(property="ville", type="text"),
         *     @OA\Property(property="contact", type="string"),
         * *     @OA\Property(property="email", type="string"),
         * )
     */

    public function up(): void
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_etab');
            $table->text('ville');
            $table->string('contact');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
