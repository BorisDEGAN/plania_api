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
            $table->text('outcomes')->nullable();
            $table->text('steps')->nullable();
            $table->text('steps_planning')->nullable();
            $table->text('budget')->nullable();
            $table->text('budget_planning')->nullable();
            $table->text('budget_notes')->nullable();
            $table->text('activities')->nullable();
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
