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
        Schema::table('templates', function (Blueprint $table) {
            // Supprimer l'ancienne colonne category
            $table->dropColumn('category');
            
            // Ajouter la nouvelle colonne category_id
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('templates', function (Blueprint $table) {
            // Supprimer la clé étrangère
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            
            // Remettre l'ancienne colonne category
            $table->string('category', 100)->comment('Catégorie ex: Classique, Moderne');
        });
    }
};
