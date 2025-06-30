# 概要

twetterのクローンアプリです。ログイン、ツイート、フォロー、DM、chatGTPによる会話アシスト機能があります

# 起動方法

```:shell
cp .env.example .env
```

.envの `OPENAI_API_KEY` にAPIキーを入力


```:shell
docker compose up -d --build
```



[http://localhost:8000](http://localhost:8000)にアクセス





# 使い方

1.新規登録を行ってください。ユーザー名、＠から始まるユーザー名、パスワードが必要です
2.会話ボタンで好きな言葉を話せます。制限は140字です。この言葉は自身のタイムラインに表示されます。
