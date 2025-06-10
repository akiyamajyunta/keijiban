{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!-- <div class="container">
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
</div> -->



    <main>
      <!-- 新規メモ投稿エリア、投稿フォーム -->
      <form action="">
        <section class="new-memo">
        <textarea placeholder="いまどんなかんじ？"></textarea>
        <button>投稿</button>
        </section>
      </form>
      <!-- 投稿済みメモ一覧 -->
      <section class="memo-list">
        <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
        <div class="memo-item">
          <div class="memo-header">
            <span class="memo-user">山田</span>
            <div class='memo-controls'>
              <span class="memo-date">2025/06/08</span>
              <span><button>削除</button></span>
            </div>
          </div>
          <div class="memo-content">
            これはサンプルのメモです。simple is the best。
          </div>
          <div class="memo-comments">
            <span class="memo-user">山田</span>
            <div class="comment">素晴らしいメモですね！</div>
            <span class="memo-user">جزرةجزرة</span>
            <div class="comment">それらは素晴らしいです</div>
            <span class="memo-user">隈</span>
            <div class="comment">おぢさんはそうは思わないカナ？</div>
            <span class="memo-user">山田</span>
            <div class="comment">米不足は自民の裏金が関与してる</div>
            <span class="memo-user">大隅</span>
            <div class="comment">100万円かせぎたいですか？今すぐクリック</div>
            <span class="memo-user">藤沢</span>
            <div class="comment">誰一人来ませんでした。</div>
            <form action="">
              <section class="new-memo" onclick="event.stopPropagation();">
              <textarea placeholder="月もきれいですね"></textarea>
              <button>返信</button>
              </section>
            </form>
          </div>
        </div>
        <!-- 必要に応じてここにメモアイテムを追加 -->
        </section>
      </main>
<style>
/* 全体の基本設定 */

body::before,
body::after {
  content: "";
  position: fixed;
  top: 0;
  bottom: 0;
  width: 2px;
  background-color: black;
}

/* 左側の線：中央部分600pxの左側端の位置を計算 */
body::before {
  left: calc((100% - 610px) / 2);
}

/* 右側の線：中央部分600pxの右側端の位置 */
body::after {
  left: calc((100% + 610px) / 2);
}

.memo-controls {
  display: flex;
  flex-direction: column;
  /* 余白を調整したい場合は、例えば下記を追加 */
  gap: 5px;
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
  max-width: 550px;
  margin: 20px auto;
  margin-top: 150px;
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


    .memo-comments {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease-out, padding 0.5s;
      background-color: #f9f9f9;
      margin-top: 10px;
      padding: 0 15px;
    }
    /* memo-item に expanded クラスが付いたとき */
    .memo-item.expanded .memo-comments {
      /* max-height: 200px;  必要に応じて調整 */
      padding: 10px 15px;
    }
    .comment {
      padding: 5px 0;
      border-bottom: 1px solid #e1e8ed;
    }
    .comment:last-child {
      border-bottom: none;
    }


</style>

  <script>
      document.querySelectorAll('.memo-item').forEach(item => {
    item.addEventListener('click', () => {
      const comments = item.querySelector('.memo-comments');
      if (item.classList.contains('expanded')) {
        // すでに展開されている場合は折りたたむ
        comments.style.maxHeight = null;
        item.classList.remove('expanded');
      } else {
        // 展開する際、コメントの scrollHeight を max-height に設定する
        item.classList.add('expanded');
        comments.style.maxHeight = comments.scrollHeight + "px";
      }
    });
  });


  </script>




