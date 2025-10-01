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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->dateTime('due_date');
            $table->string('status');
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id') // The column being referenced (in the 'users' table)
                  ->on('users')     // The table being referenced
                  ->onDelete('cascade'); // Optional: What to do if the user is deleted?

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
