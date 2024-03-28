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
            $table->json('outcomes')->nullable();
            $table->json('steps')->nullable();
            $table->json('steps_planning')->nullable();
            $table->json('budget')->nullable();
            $table->json('budget_planning')->nullable();
            $table->json('budget_notes')->nullable();
            $table->json('activities')->nullable();
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
