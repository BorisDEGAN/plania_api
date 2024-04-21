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
            $table->json('description')->nullable();
            $table->json('objectives')->nullable();

            //Résultats du projet
            $table->json('outcomes')->nullable();
            $table->json('logical_context')->nullable();
            $table->json('intervention_strategies')->nullable();
            $table->text('quality_monitoring')->nullable();
            $table->json('patners')->nullable();
            $table->json('performance_matrix')->nullable();
            $table->json('budget_plan')->nullable();
            $table->json('calendar')->nullable();
            
            $table->integer('duration')->nullable();
            $table->double('budget')->nullable();
            $table->string('budget_currency')->nullable();
            
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
