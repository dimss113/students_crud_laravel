<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_extracurriculars', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('extracurricular_id');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop foreign key
        // Schema::table('student_extracurriculars', function (Blueprint $table) {
        //     $table->dropForeign(['student_id']);
        //     $table->dropForeign(['extracurricular_id']);
        // });
        Schema::dropIfExists('student_extracurriculars');
    }
};