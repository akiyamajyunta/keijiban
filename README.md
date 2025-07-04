# 概要

twetterのクローンアプリです。ログイン、ツイート、フォロー、DM、chatGTPによる会話アシスト機能があります

# 起動方法

```:shell
cp .env.example .env
```

.envの `OPENAI_API_KEY` にAPIキーを入力

初回
```:shell
    docker compose up --build
```

```:shell
    docker compose up -d
```

    fork/exec /usr/local/lib/docker/cli-plugins/docker-buildx: no such file or directory

と表示されたら


```:shell
docker buildx build -t lara_deploy
```

[http://localhost:8000](http://localhost:8000)にアクセス





# 使い方

1.新規登録を行ってください。ユーザー名、＠から始まるユーザー名、パスワードが必要です
2.会話ボタンで好きな言葉を話せます。制限は140字です。この言葉は自身のタイムラインに表示されます。
