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
        Schema::create('address_translations', function (Blueprint $table) {
            $table->id();
            $table->text("address");
       

            $table->foreignId("address_id")->constrained("addresses")->cascadeOnDelete();
            $table->foreignId("language_id")->constrained("languages")->cascadeOnDelete();

            $table->unique(["address_id", "language_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_translations');
    }
};
