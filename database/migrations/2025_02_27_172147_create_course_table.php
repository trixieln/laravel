<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('name', 45);
            $table->string('description', 45);
            $table->unsignedBigInteger('grade_id');
            $table->timestamps();
    
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
