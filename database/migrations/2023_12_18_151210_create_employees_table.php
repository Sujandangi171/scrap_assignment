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
            $table->string("staff_name");
            $table->string("designation");
            $table->string("phone");
            $table->string("email");
            $table->string("profile_pic");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
    
     */

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
