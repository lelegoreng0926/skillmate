<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sender_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('receiver_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('skill_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('message');

            $table->date('meeting_date')->nullable();

            $table->time('meeting_time')->nullable();

            $table->string('meeting_link')->nullable();

            $table->enum('status', [
                'Pending',
                'Accepted',
                'Rejected',
                'Completed'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_requests');
    }
};