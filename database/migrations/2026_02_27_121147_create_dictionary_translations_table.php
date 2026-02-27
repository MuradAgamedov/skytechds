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
        Schema::create('dictionary_translations', function (Blueprint $table) {
            $table->id();
            $table->longText("value");
            $table->foreignId("dictionary_id")->constrained("dictionaries")->cascadeOnDelete();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->unique(["dictionary_id", "language_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_translations');
    }
};
