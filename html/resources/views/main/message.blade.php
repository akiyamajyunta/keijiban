{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

    <main>
    <!-- 投稿済みメモ一覧 -->
        <section class="memo-list">
            <a href="{{route('direct')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                <div class="memo-header">
                    <span class="memo-user">山田</span>
                    <div class='memo-controls'>
                    </div>
                </div>
                <div class="memo-content">
                    山田
                    yamada1234
                </div>
                </div>
            </a>   
        </section>
                <section class="memo-list">
            <a href="{{route('direct')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                <div class="memo-header">
                    <span class="memo-user">山田</span>
                    <div class='memo-controls'>
                    </div>
                </div>
                <div class="memo-content">
                    山田
                    yamada1234
                </div>
                </div>
            </a>   
        </section>
                <section class="memo-list">
            <a href="{{route('direct')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                <div class="memo-header">
                    <span class="memo-user">山田</span>
                    <div class='memo-controls'>
                    </div>
                </div>
                <div class="memo-content">
                    山田
                    yamada1234
                </div>
                </div>
            </a>   
        </section>
    </main>



<style>
/* 全体の基本設定 */
body {
    font-family: Arial, sans-serif;
    background-color: #e6ecf0;
    padding: 0;
}
/* 画面全体の左右に線を表示 */
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



/* メインコンテンツのコンテナ */
main {
    max-width: 600px;
    margin: 0px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 300px;
}



.memo-list{
    margin-top: 5px;
    border: 1px solid;
    border-radius: 8px;

}


.memo-list:hover{
    background-color: rgb(255, 255, 227);
    border-radius: 8px;
}
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


</style>

