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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('context')->nullable();
            $table->integer('duration')->nullable();
            $table->json('objectives')->nullable();
            $table->json('outcomes')->nullable();
            $table->json('activities')->nullable();
            $table->json('budget_plan')->nullable();
            $table->json('calendar')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();

            $table->json('partners')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
