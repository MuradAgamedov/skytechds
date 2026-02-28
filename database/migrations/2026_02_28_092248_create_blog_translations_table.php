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
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("seo_title")->nullable();
            $table->text("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->string("card_image_alt_text")->nullable();
            $table->longText("description")->nullable();
            $table->foreignId("language_id")->constrained()->cascadeOnDelete();
            $table->foreignId("blog_id")->constrained()->cascadeOnDelete();
            $table->unique(["language_id", "blog_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_translations');
    }
};
