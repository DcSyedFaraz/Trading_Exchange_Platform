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
        Schema::table('messages', function (Blueprint $table) {
            $table->index(['chat_id', 'read_at']);
            $table->index('sender_id');
        });

        Schema::table('chats', function (Blueprint $table) {
            $table->index('user_one_id');
            $table->index('user_two_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropIndex(['chat_id', 'read_at']);
            $table->dropIndex(['sender_id']);
        });

        Schema::table('chats', function (Blueprint $table) {
            $table->dropIndex(['user_one_id']);
            $table->dropIndex(['user_two_id']);
            $table->dropIndex(['product_id']);
        });
    }
};
