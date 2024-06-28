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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("division_id")->unsigned();
            $table->string("number_id", 25)->unique();
            $table->string("picture",255)->nullable();
            $table->string("name", 255);
            $table->char("gender", 1);
            $table->string("birth_place", 255);
            $table->date("birth_date");
            $table->longText("address");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
