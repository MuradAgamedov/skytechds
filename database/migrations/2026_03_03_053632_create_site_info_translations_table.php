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
        Schema::create('site_info_translations', function (Blueprint $table) {
            $table->id();
            $table->string("header_logo_light_for_mode_alt_text");
            $table->string("header_logo_dark_for_mode_alt_text");
            $table->string("footer_logo_light_mode_alt_text");
            $table->string("footer_logo_dark_mode_alt_text");
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();
            $table->foreignId("site_info_id")->constrained("site_infos")->cascadeOnDelete();
            $table->unique(["language_id", "site_info_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_info_translations');
    }
};
