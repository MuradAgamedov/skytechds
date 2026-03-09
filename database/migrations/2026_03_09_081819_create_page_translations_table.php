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
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("page_id")->constrained("pages")->cascadeOnDelete();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->string("title")->nullable();
            $table->string("seo_title")->nullable();
            $table->text("seo_description")->nullable();
            $table->text("seo_keywords")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};
