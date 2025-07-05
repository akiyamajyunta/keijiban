# 概要

twetterのクローンアプリです。ログイン、ツイート、フォロー、DM、chatGTPによる会話アシスト機能があります

# 起動方法

初回

```:shell
cp .env.example .env
```

html直下で
```:shell
composer install
```

app_key を発行
```:shell
php artisan key:generate
```

データベースファイルを作製
```:shell
touch database/database.sqlite
```


.env のファイルのSESSION_DRIVERを変更
```:shell
変更前
SESSION_DRIVER=database

変更後
SESSION_DRIVER=file
```

.envの `OPENAI_API_KEY` にAPIキーを入力

```:shell
    docker compose up --build
```
コンテナの中に入る
```:shell
    docker compose exec stduy-laravel-server bash
```

artisan ディレクトリでマイグレートを実行
```:shell
    php artisan migrate:fresh
```



[http://localhost:8000](http://localhost:8000)にアクセス

2回目

```:shell
    docker compose up -d
```


# 使い方

1.新規登録を行ってください。ユーザー名、＠から始まるユーザー名、パスワードが必要です
2.会話ボタンで好きな言葉を話せます。制限は140字です。この言葉は自身のタイムラインに表示されます。
