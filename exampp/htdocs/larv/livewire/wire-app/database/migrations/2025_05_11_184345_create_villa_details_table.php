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
        Schema::create('villa_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->char("floors");
            $table->integer("rooms")->nullable();
            $table->integer("bathrooms")->nullable();
            $table->enum("hall",["wide","small","middle"]);
            $table->enum("entrance",["one","two"]);
            $table->boolean("has_gardan")->default(false);
            $table->boolean("has_pool")->default(false);
            $table->boolean("has_grash")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_details');
    }
};
