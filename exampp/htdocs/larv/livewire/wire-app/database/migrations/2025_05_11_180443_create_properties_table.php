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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->char("name",64);
            $table->enum("type",["villa","apartment","room","building","shop"])->default('apartment');
            $table->foreignId("street_id")->constrained()->onDelete("cascade");
            $table->float("price",4,4);
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->enum("purpose",["selling","renting"]);
            $table->enum("status",["available","rented","pendding","sold"]);
            $table->char("area_2m")->nullable();
            $table->decimal("longitude",10,8)->nullable();
            $table->decimal("altitude",10,8)->nullable();
            $table->text("location_note")->nullable();
            $table->boolean("negotiable")->default(true);
            $table->text("description")->nullable();
            $table->text("is_furnished")->nullable();
            $table->string("primary_path")->nullable();
            $table->boolean("is_verified")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
