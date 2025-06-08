@extends('layouts.app')
@include('parts.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a>ログイン成功</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>




  <main>
    <!-- 新規メモ投稿エリア、投稿フォーム -->
    <section class="new-memo">
      <textarea placeholder="メモを入力しよう"></textarea>
      <button>投稿</button>
    </section>

    <!-- 投稿済みメモ一覧 -->
    <section class="memo-list">
      <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>

       <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <div class="memo-item">
        <div class="memo-header">
          <span class="memo-user">山田</span>
          <span class="memo-date">2025/06/08</span>
        </div>
        <div class="memo-content">
          これはサンプルのメモです。Twitter のタイムラインのようなシンプルな表示を目指しています。
        </div>
      </div>
      <!-- 必要に応じてここにメモアイテムを追加 -->
    </section>
  </main>
</body>
</html>


<style>
/* 全体の基本設定 */
body {
  font-family: Arial, sans-serif;
  background-color: #e6ecf0;
  margin: 0;
  padding: 0;
}

/* ヘッダーのスタイル */
.header {
  background-color: #1da1f2;
  color: white;
  padding: 10px 20px;
  display: flex;
  align-items: center;
  font-size: 1.5rem;
}

.logo {
  font-weight: bold;
}

/* メインコンテンツのコンテナ */
main {
  max-width: 600px;
  margin: 20px auto;
  background-color: #fff;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* 新規メモ投稿エリア */
.new-memo {
  margin-bottom: 20px;
}

.new-memo textarea {
  width: 100%;
  border: 1px solid #ccd6dd;
  border-radius: 4px;
  padding: 10px;
  resize: vertical;
  min-height: 80px;
  font-size: 1rem;
}

.new-memo button {
  background-color: #1da1f2;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  cursor: pointer;
  font-size: 1rem;
  margin-top: 10px;
}

.new-memo button:hover {
  background-color: #0d95e8;
}

/* メモ一覧のスタイル */
.memo-list .memo-item {
  border-bottom: 1px solid #e1e8ed;
  padding: 15px 0;
}

.memo-list .memo-item:last-child {
  border-bottom: none;
}

/* メモ項目のヘッダー */
.memo-header {
  display: flex;
  justify-content: space-between;
  font-size: 0.9rem;
  color: #657786;
}

/* メモ内容のスタイル */
.memo-content {
  font-size: 1.1rem;
  color: #14171a;
  margin-top: 5px;
  line-height: 1.4;
}


</style>















@endsection
