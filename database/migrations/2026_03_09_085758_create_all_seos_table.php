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
        Schema::create('all_seos', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_indexed")->default(true);
            $table->boolean("is_followed")->default(true);
            $table->longText("meta_header")->default("");
            $table->longText("meta_footer")->default("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_seos');
    }
};
