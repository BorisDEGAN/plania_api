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
            //Introduction
            $table->string('title')->nullable();
            $table->text('overview')->nullable();
            $table->text('context')->nullable();
            $table->text('justification')->nullable();
            $table->text('description')->nullable();
            $table->text('executive_resume')->nullable();
            $table->text('global_objective')->nullable();
            $table->text('objectives')->nullable();

            //Résultats du projet
            $table->text('outcomes')->nullable();
            $table->text('logical_context')->nullable();
            $table->text('intervention_strategies')->nullable();
            $table->text('quality_monitoring')->nullable();
            $table->text('partners')->nullable();
            $table->text('performance_matrix')->nullable();
            $table->text('budget_plan')->nullable();
            $table->text('calendar')->nullable();

            $table->integer('duration')->nullable();
            $table->double('budget')->nullable();
            $table->string('budget_currency')->nullable();

            // $table->foreignId('project_id')->nullable()->constrained();
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
