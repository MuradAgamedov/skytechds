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
        Schema::create('portfolio_translations', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreignId("portfolio_id")->constrained("portfolios")->cascadeOnDelete();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->unique(["portfolio_id", "language_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_translations');
    }
};
