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
            $table->text('justification')->nullable();
            $table->integer('duration')->nullable();
            $table->text('global_objective')->nullable();
            $table->json('objectives')->nullable();
            $table->json('outcomes')->nullable();
            $table->json('activities')->nullable();
            $table->json('logical_context')->nullable();
            $table->json('budget_plan')->nullable();
            $table->double('budget')->nullable();
            $table->string('budget_currency')->nullable();
            $table->text('intervention_strategy')->nullable();
            $table->text('quality_monitoring')->nullable();
            $table->json('patners')->nullable();
            $table->json('performance_matrix')->nullable();
            $table->json('calendar')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
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
