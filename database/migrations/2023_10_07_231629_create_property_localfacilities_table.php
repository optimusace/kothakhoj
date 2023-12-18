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
        Schema::create('property_localfacilities', function (Blueprint $table) {
            $table->id();
            $table->boolean("gym")->default(0);
            $table->boolean("swimming")->default(0);
            $table->boolean("hospital")->default(0);
            $table->boolean("montessori")->default(0);
            $table->boolean("gas")->default(0);
            $table->boolean("temple")->default(0);
            $table->boolean("resturants")->default(0);
            $table->boolean("bank")->default(0);
            $table->boolean("bus")->default(0);
            $table->boolean("school")->default(0);
            $table->boolean("park")->default(0);
            $table->boolean("college")->default(0);
            $table->boolean("market")->default(0);
            $table->boolean("banquet")->default(0);
            $table->foreignId("property_id")->constrained(table:"properties")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_localfacilities');
    }
};
