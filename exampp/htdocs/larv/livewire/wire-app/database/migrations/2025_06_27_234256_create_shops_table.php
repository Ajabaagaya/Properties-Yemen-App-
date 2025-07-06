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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->boolean("on_main_street")->default(false);
            $table->float("font_width")->nullable();
            $table->boolean("has_toilet")->default(false);
            $table->string("shop_type")->nullable();
            $table->boolean("has_storage")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
