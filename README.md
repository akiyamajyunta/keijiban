# 概要

Twitterのクローンアプリです。ログイン、投稿、フォロー、ダイレクトメッセージ、chatGTPによる会話アシスト機能があります

# 起動方法

初回

```:shell
cp .env.example .env
```

compoer をインストール

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


.env のファイルのSESSION_DRIVERをfileに変更
```:shell
変更前
SESSION_DRIVER=database

変更後
SESSION_DRIVER=file
```

.envの 

```:shell
OPENAI_API_KEY= 
```

 にAPIキーを入力

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


# LLMのサポートについて

本アプリはchatGPTによる会話アシスト機能を投稿、ダイレクトメッセージにて実装しています。
使用方法は「投稿」の横にある「与太」を押すことで、自動で生成されます。
生成されるキーワードは自動生成されますが、ダイレクトメッセージで相手が何かメッセージを送っていた場合は、その言葉に応じた
メッセージを生成します。