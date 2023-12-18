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
        Schema::create('property_amenities', function (Blueprint $table) {
            $table->id();
            $table->integer("numberOfRoom");
            $table->integer("floor");
            $table->string("roadType");
            $table->boolean("furniture");
            $table->boolean("water");
            $table->boolean("bathroom");
            $table->boolean("kitchen");
            $table->boolean("internet");
            $table->boolean("laundry");
            $table->boolean("parking");
            $table->boolean("pet");
            $table->foreignId("property_id")->constrained(table:"properties")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_amenities');
    }
};
