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
        Schema::create('classroom', function (Blueprint $table) {
            $table->id('classroom_id');
            $table->year('year');
            $table->unsignedBigInteger('grade_id');
            $table->char('section', 2);
            $table->boolean('status')->default(1);
            $table->string('remarks', 45)->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
    
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom');
    }
};
