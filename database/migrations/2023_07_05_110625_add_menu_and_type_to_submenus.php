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
        Schema::table('submenus', function (Blueprint $table) {
            $table->enum('menu', ['tentang sangihe', 'layanan dan informasi publik'])->default('tentang sangihe');
            $table->enum('type', ['single post', 'multiple posts'])->default('single post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('submenus', function (Blueprint $table) {
            $table->dropColumn('menu');
            $table->dropColumn('type');
        });
    }
};
