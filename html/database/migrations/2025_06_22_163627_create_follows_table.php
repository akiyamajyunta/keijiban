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
            Schema::create('follows', function (Blueprint $table) {
            $table->id();
            // フォローする側（フォロワー）のユーザーID
            $table->foreignId('follower_id')->constrained('users')->onDelete('cascade');
            // フォローされる側（フォロー対象）のユーザーID
            $table->foreignId('followed_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            // 同じ組み合わせが重複しないようにユニーク制約を追加
            $table->unique(['follower_id', 'followed_id']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
