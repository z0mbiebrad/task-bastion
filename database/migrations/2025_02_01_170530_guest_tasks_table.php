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
        Schema::create('guest_tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('guest_id')
                ->index();
            $table->string('task');
            $table->boolean('completed')
                ->default(false);
            $table->string('category')->nullable();
            $table->string('task_days')
                ->nullable();
            $table->string('custom_category')
                ->nullable();
            $table->json('custom_task_days')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_tasks');
    }
};
