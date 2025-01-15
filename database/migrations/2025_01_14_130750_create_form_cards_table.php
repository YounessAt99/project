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
        Schema::create('form_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('insurance');
            $table->string('insurance_factor');
            $table->string('annual_limit');
            $table->string('advantage');
            $table->string('annual_limit_factor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_cards');
    }
};
