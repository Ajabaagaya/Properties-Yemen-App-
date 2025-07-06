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
        Schema::create('room_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("propery_id")->constrained()->onDelete("cascade");
            $table->enum("size",["wide","small","middle"])->default(false);
            $table->enum("status",["sperate","in_apartment"])->default(false);
            $table->enum("bathroom",["private","in_apartment","no-exists"])->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_details');
    }
};
