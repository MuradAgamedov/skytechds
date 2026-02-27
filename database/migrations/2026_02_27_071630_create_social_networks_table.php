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
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();
            $table->enum("platform", ["facebook", "twitter", "instagram", "youtube", "tikTok", "pinterest", "reddit", "telegram", "whatsapp", "discord", "threads", "twitch", "wechat"]);
            $table->integer("order")->default(1);
            $table->boolean("status")->default(true);
            $table->string("url")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_networks');
    }
};
