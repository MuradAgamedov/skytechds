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
        Schema::create('statistics_translations', function (Blueprint $table) {
            $table->id();
            $table->string("icon_alt_text")->nullable();
            $table->string("title")->nullable();
            $table->string("subtitle")->nullable();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->foreignId("statistic_id")->constrained("statistics")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics_translations');
    }
};
