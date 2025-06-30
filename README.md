# 概要

twetterのクローンアプリです。ログイン、ツイート、フォロー、DM、chatGTPによる会話アシスト機能があります

# 起動方法


## 1回目

```:shell
docker compose up -d
```
vite の起動

```:shell
npm run dev 
```

コンテナ内に入る

```:shell
docker compose exec stduy-laravel-server bash
```



コンテナの中に入っていることを確認

```:shell
composer create-project laravel/laravel --prefer-dist .
```

API を使用するためにライブラリーをインストール
```:shell
composer require openai-php/client
```

.envの

    OPENAI_API_KEY=　

にAPIキーを入力


```:shell
php artisan serve --host=0.0.0.0 --port=8000
```

[http://localhost:8000](http://localhost:8000)にアクセス

localhost:8000

## 2回目

```:shell
docker compose up -d
```

vite の起動

```:shell
npm run dev 
```

コンテナ内に入る
```:shell
docker compose exec stduy-laravel-server bash
```

コンテナの中に入っていることを確認

```:shell
php artisan serve --host=0.0.0.0 --port=8000
```

[http://localhost:8000](http://localhost:8000)にアクセス

# 使い方

1.新規登録を行ってください。ユーザー名、＠から始まるユーザー名、パスワードが必要です
2.制限は140字です。この言葉は自身のタイムラインに表示されます。
