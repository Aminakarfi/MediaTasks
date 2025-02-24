<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link task to a user
            $table->string('day'); // Monday, Tuesday, etc.
            $table->enum('type', ['daily', 'project']); // Task type
            $table->boolean('completed')->default(false); // Task status
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tasks');
    }
};
