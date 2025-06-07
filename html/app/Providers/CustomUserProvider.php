<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Closure;
use Illuminate\Contracts\Support\Arrayable;

class CustomUserProvider extends EloquentUserProvider implements UserProvider
{
    /**
     * 認証対象のEloquentモデルを取得するためのクエリを構築する
     */
    public function retrieveByCredentials(array $credentials)
    {
        // パスワードとextra_idに関するキーを除外
        $credentials = array_filter(
            $credentials,
            fn($key) => !(str_contains($key, 'password') || str_contains($key, 'extra_id')),
            ARRAY_FILTER_USE_KEY
        );
        
        if (empty($credentials)) {
            return null;
        }
        
        $query = $this->newModelQuery();
        
        foreach ($credentials as $key => $value) {
            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } elseif ($value instanceof Closure) {
                $value($query);
            } else {
                $query->where($key, $value);
            }
        }
        
        return $query->first();
    }
    
    /**
     * 取得したユーザー情報と入力された認証情報が一致するかを検証する
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'] ?? null;
        if (is_null($plain)) {
            return false;
        }
        
        return $this->hasher->check($plain, $user->getAuthPassword())
            && (($credentials['extra_id'] ?? null) === "1");
    }
}

