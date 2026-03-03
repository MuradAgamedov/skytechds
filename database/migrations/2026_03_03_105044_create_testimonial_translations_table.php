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
        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->id();
            $table->string("full_name")->nullable();
            $table->text("text")->nullable();
            $table->string("position")->nullable();
            $table->string("company")->nullable();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->foreignId("testimonial_id")->constrained("testimonials")->cascadeOnDelete();
            $table->unique(["language_id", "testimonial_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_translations');
    }
};
