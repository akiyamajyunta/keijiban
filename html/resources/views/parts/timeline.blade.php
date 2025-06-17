<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <title>Document</title>
</head>

<body>

    @foreach ($tweets->reverse() as $tweet)
    <section class="memo-list">
        <div class="memo-item">
            <div class="memo-header">
                <form action="{{route('profile')}}" method="POST">
                    <span class="memo-user">
                        @csrf
                        <input type="hidden" name="user_id" value='{{ $tweet->user_id}}'>
                        <button onclick="event.stopPropagation()">{{ $tweet->name}}</button>
                    </span>
                </form>
                <span class="memo-user">{{ $tweet->user_id }}</span>
                <div class='memo-controls'>
                    <span class="memo-date">{{ $tweet->created_at}}</span>
                    @if ($tweet->user_id === Auth::id())
                    <form action="{{route('tweet.delete')}}">
                        <span>
                            <input type="hidden" name="id" value="{{$tweet->id}}">
                            <button onclick="event.stopPropagation()">削除</button>
                        </span>
                    </form>
                    @endif
                </div>
            </div>
            <div class="memo-content">
                <p>{{$tweet->content}}</p>
            </div>
            <!-- 返信,要するにコメント -->
            <div class="memo-comments" onclick="event.stopPropagation()">
                <form action="{{route('comment.store')}}">
                    <section class="new-memo" onclick="event.stopPropagation();">
                        @csrf
                        <input type="hidden" name="tweet_id" value='{{$tweet->id}}'>
                        <input type="hidden" name="user_id" value='{{$tweet->user_id}}'>
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
</body>

</html>

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