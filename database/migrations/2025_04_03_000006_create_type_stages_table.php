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
         *     schema="type_stages",
         *     @OA\Property(property="name", type="string"),
         *     @OA\Property(property="durre", type="dateTime"),
         *     @OA\Property(property="description", type="text"),
         * )
     */


    public function up(): void
    {
        Schema::create('type_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('duree');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_stages');
    }
};
