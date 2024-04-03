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
        Schema::create('students', function (Blueprint $table) {
            $table->string('INDEX_NO')->primary();
            $table->string('NAME');
            $table->date('DOB');
            $table->string('CID')->nullable();
            $table->string('SCHOOL');
            $table->string('SUB1')->nullable();
            $table->string('MKS1')->nullable();
            $table->string('SUB2')->nullable();
            $table->string('MKS2')->nullable();
            $table->string('SUB3')->nullable();
            $table->string('MKS3')->nullable();
            $table->string('SUB4')->nullable();
            $table->string('MKS4')->nullable();
            $table->string('SUB5')->nullable();
            $table->string('MKS5')->nullable();
            $table->string('SUB6')->nullable();
            $table->string('MKS6')->nullable();
            $table->integer('TOTAL')->nullable();

            $table->string('status')->default('approved');
            $table->integer('year')->default(date('Y'));
            $table->boolean('SOC')->default(false);
            $table->integer('SOC_RANKING')->nullable();
            $table->boolean('SIDD')->default(false);
            $table->integer('SIDD_RANKING')->nullable();
            $table->enum('ELIGIBILITY', ['Eligible', 'Not Eligible'])->default('Not Eligible');
            $table->string('email')->nullable()->default(null);
            $table->integer('phone')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
