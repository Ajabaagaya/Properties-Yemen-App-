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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("city_id")->constrained()->onDelete("cascade");
            $table->char("name",24);
            $table->char("street",100)->nullable();
            $table->char("beside",100)->nullable();
            $table->decimal("latitude",10, 8)->nullable();
            $table->decimal("longitude",10, 8)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
