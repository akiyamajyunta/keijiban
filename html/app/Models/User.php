<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'userId',
        'password',
        'profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //メッセージの送信
    public function sentMessages()
    {
        return $this->hasMany(DirectMessage::class, 'sender_id');
    }
    //メッセージの受信
    public function receivedMessages()
    {
        return $this->hasMany(DirectMessage::class, 'recipient_id');
    }

    public function followings()
    {
        // 自分がフォローしているユーザーを取得
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        // 自分をフォローしているユーザーを取得
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }
}
