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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->char("apartments_no")->nullable();
            $table->enum("entrances",["one","two"])->nullable();
            $table->enum("usage",["trading","tanants","student","mixed"])->nullable();
            $table->boolean("has_parking")->default(false);
            $table->boolean("has_garden")->default(false);
            $table->integer("floors")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
