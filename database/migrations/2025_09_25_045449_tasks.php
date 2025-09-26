<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('task_type_id');
            $table->unsignedBigInteger('task_priority_id');
            $table->unsignedBigInteger('task_status_id')->default(1);
            $table->timestamps();

            // Foreign key constraints
            // $table->foreignId('task_type_id')->constrained('task_types')->cascadeOnDelete();
            // $table->foreignId('task_priority_id')->constrained('task_priorities')->cascadeOnDelete();
            // $table->foreignId('task_status_id')->constrained('task_statuses')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
