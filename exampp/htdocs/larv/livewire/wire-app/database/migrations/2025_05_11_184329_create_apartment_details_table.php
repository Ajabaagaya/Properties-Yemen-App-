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
        Schema::create('apartment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->foreignId("floor_id")->constrained()->onDelete("cascade");
            $table->char("room_no")->nullable();
            $table->integer("bedrooms")->nullable();
            $table->enum("bathrooms",["two","one"])->nullable();
            $table->enum("living_room",["sperated_bath","no_bath","no_existing"]);
            $table->enum("hall",["wide","small","middle","no-exists"]);
            $table->boolean("kitchen")->default(true);
            $table->boolean("has_balcony")->default(false);
            $table->integer("floor")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_details');
    }
};
