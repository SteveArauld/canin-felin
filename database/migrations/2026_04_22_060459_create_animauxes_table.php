<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animaux', function (Blueprint $table) {
            $table->id();
            $table->integer('animal_id')->unique();
            $table->string('nom');
            $table->string('slug');
            $table->string('race');
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->string('lien')->nullable();
            $table->string('prix')->nullable();
            $table->foreignId('race_id')->nullable()->after('race')->constrained('races')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animaux');
    }
};