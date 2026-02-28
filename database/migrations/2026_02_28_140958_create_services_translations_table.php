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
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("card_title");
            $table->string("icon_alt_text")->nullable();
            $table->string("inner_image_alt_text")->nullable();
            $table->string("seo_title");
            $table->string("seo_description");
            $table->string("seo_keywords");
            $table->longText("description");
            $table->foreignId("service_id")->constrained("services")->cascadeOnDelete();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->unique(["service_id", "language_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_translations');
    }
};
