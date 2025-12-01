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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->primary('id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('chat_id')->constrained();
            $table->string('message');
            $table->timestamp('sent_at');
        });

        Schema::table('chat_participants', function (Blueprint $table) {
            $table->foreignId('chat_id')->constrained();
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('chat_participants');
        schema::table('users', function (Blueprint $table) {
           $table->dropColumn('role');
        });

    }
};
