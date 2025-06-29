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
        Schema::create('direct_messages', function (Blueprint $table) {
            $table->id();
            // users テーブルとの外部キー。ユーザーが削除されたら関連メッセージも削除される
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('recipient_id')->constrained('users')->onDelete('cascade');
            // 相手の名前（文字列として保存）。必要に応じて表示用途に利用
            $table->string('name')->nullable();
            //ユーザーのID
            $table->string('recipient_user_id')->nullable();
            // 実際のメッセージ本文。長文も扱えるテキスト型
            $table->text('message');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direct_messages');
    }
};
