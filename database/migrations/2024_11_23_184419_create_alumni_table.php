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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employment_status_id')->constrained('employment_status')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('fullname');
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('civilstatus')->nullable();
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('zipcode')->nullable();
            $table->integer('batch')->nullable();
            $table->string('facebook')->nullable();
            $table->string('organization')->nullable();
            $table->string('profession')->nullable();
            $table->string('type')->nullable();  // Example: Working Full Time, Part-Time
            $table->string('location')->nullable();
            $table->string('status')->nullable();
            $table->string('number')->nullable();
            $table->integer('expectedincome')->nullable();
            $table->string('relatedfield')->nullable();
            $table->text('reason')->nullable();
            $table->string('company')->nullable();
            $table->string('num')->nullable();
            $table->integer('incomerange')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
