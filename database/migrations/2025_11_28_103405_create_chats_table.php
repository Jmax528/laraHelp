<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create chats table
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->foreignId('user_id')
                ->unique() // ensures one chat per user
                ->constrained() // links to users.id
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes(); // deleted_at column
        });

        // Create messages table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('chat_id')
                ->constrained('chats')
                ->cascadeOnDelete();

            $table->string('message');

            $table->timestamp('sent_at')->useCurrent();
        });

        // Create chat participants (only needed for group chats)
        Schema::create('chat_participants', function (Blueprint $table) {
            $table->foreignId('chat_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->primary(['chat_id', 'user_id']);
        });

        // Add role + anonymous flag to users table
        Schema::table('users', function (Blueprint $table) {

            // 0 = user, 1 = admin
            $table->tinyInteger('role')->default(0);

            // user chooses anonymity
            $table->boolean('anon')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'anonymous']);
        });

        Schema::dropIfExists('chat_participants');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('chats');
    }
};
