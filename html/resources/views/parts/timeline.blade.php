
@foreach ($tweets->reverse() as $tweet) 
        <section class="memo-list">
        <div class="memo-item">
            <div class="memo-header">
                <form action="{{route('profile')}}" method="POST">
                    <span class="memo-user">
                        @csrf
                        <input type="hidden" name="id" value='{{ $tweet->user_id  }}'>
                        <button onclick="event.stopPropagation()">{{ $tweet->name}}</button>
                    </span>
                </form>
                    
                    <span class="memo-user">{{ $tweet->user_id }}</span>
                <div class='memo-controls'>
                    <span class="memo-date">{{ $tweet->created_at}}</span>
                    <form action="{{route('tweet.delete')}}">
                        <span>
                            @if ($tweet->user_id === Auth::id())
                            <input type="hidden" name="id" value="{{$tweet->id}}">
                            <button onclick="event.stopPropagation()">削除</button>
                            @endif
                        </span>
                    </form>
                </div>
            </div>
            <div class="memo-content"> 
            </div>
            <!-- 返信 -->
            <div class="memo-comments"  onclick="event.stopPropagation()">
                <form action="{{route('comment.store')}}">
                    <section class="new-memo" onclick="event.stopPropagation();">
                        @csrf 
                        <input type="hidden" name="tweet_id" value='{{$tweet->id}}'>
                        <textarea placeholder="送信" name="comment"></textarea>
                        <button>返信</button>
                    </section>
                </form>
            
                @foreach($tweet->comments->reverse() as $comment)
                <div class='comment-contener'>
                    <div class="comment-header">
                        <p>{{ $comment->user->name }}</p>
                        <p>{{$comment->created_at}}</p>
                    </div>
                    <div class="comment">{{ $comment->comment }}</div>
                    <!-- <p>{{$comment->id}}</p> -->
                    <form action="{{route('comment.delete')}}">
                            @if ($comment->user_id === Auth::id())
                            <input type="hidden" name="id" value="{{$comment->id}}">
                            <button onclick="event.stopPropagation()">削除</button>
                            @endif
                    </form>
                </div> 
                @endforeach($tweet->comments as $comment)
            </div>

        </div>
    </section>
     @endforeach  
</main>
<style>

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
    border: 1px solid black;
    padding: 15px 10px;
    margin: 10px;
    border-radius: 3px;
}

/* .memo-list .memo-item:last-child {
    border-bottom: none;

} */

/* メモ項目のヘッダー */
.memo-header {
    display: flex;
    justify-content: space-between;
    font-size: 0.9rem;
    color: #657786;
    justify-content: space-between;

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
.comment-header {
    display: flex;
    margin-bottom: 0;
    justify-content: space-between;
    font-size: 0.9rem;
    color: #657786;
}
.comment-contener{
    border: 1px solid black;
    padding: 2px;
    margin-bottom: 3px;
}

.comment-contener button {
    background-color: #1da1f2;
    color: white;
    border: none;
    padding: 1px 3px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}
.comment {
    padding: 0;
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