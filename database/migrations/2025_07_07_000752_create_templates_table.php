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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nom du template');
            $table->string('category', 100)->comment('Catégorie ex: Classique, Moderne');
            $table->longText('html_content')->comment('HTML complet du template avec variables');
            $table->string('preview_image')->nullable()->comment('Chemin ou URL de l\'aperçu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
