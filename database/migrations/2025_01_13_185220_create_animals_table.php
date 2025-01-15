<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('policy_number')->unique();
            $table->enum("sexe",["male","femelle"]);
            $table->string('image')->nullable();
            $table->foreignId('age_id');
            $table->foreignId('breed_id');
            $table->foreignId('breed_type_id');
            $table->foreignId('client_id');
            $table->foreignId('form_card_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
