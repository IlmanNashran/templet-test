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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('report_no')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->string('description');
            $table->string('block');
            $table->string('location');
            $table->foreignId('technician_id')->nullable()->constrained('users');
            $table->foreignId('supervisor_id')->nullable()->constrained('users');
            $table->string('supervisor_remark')->nullable();
            $table->string('status');
            $table->string('technician_remark')->nullable();
            $table->dateTime('completed_at')->nullable();
            $table->dateTime('responded_at')->nullable();
            $table->dateTime('rated_at')->nullable();
            $table->integer('rating')->nullable();
            $table->string('rating_remark')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

