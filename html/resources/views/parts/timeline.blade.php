    @foreach ($tweets->reverse() as $tweet)
    <section class="twi-list">
        <div class="twi-item">
            <div class="twi-header">
                <form action="{{route('profile')}}" method="POST">
                    <span>
                        @csrf
                        <input type="hidden" name="user_id" value='{{ $tweet->user_id}}'>
                        <button class="btn-name" onclick="event.stopPropagation()">{{ $tweet->name}}</button>
                    </span>
                </form>
                
                <div class='twi-controls'>
                    <p class="twi-date">{{ $tweet->created_at}}</p>
                    <hr>
                    @if ($tweet->user_id === Auth::id())
                    <form action="{{route('tweet.delete')}}" method="post">
                        <span>
                            @csrf
                            <input type="hidden" name="id" value="{{$tweet->id}}">
                            <button class='btn-delete' onclick="event.stopPropagation()">削除</button>
                        </span>
                    </form>
                    @endif
                </div>
            </div>
            <div class="twi-content">
                <p>{{$tweet->content}}</p>
            </div>
            <hr>
            <!-- 返信,要するにコメント -->
            <div class="twi-comments" onclick="event.stopPropagation()">
                <section class="new-twi" onclick="event.stopPropagation();">
                    <form action="{{route('comment.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="tweet_id" value='{{$tweet->id}}'>
                        <input type="hidden" name="user_id" value='{{$tweet->user_id}}'>
                        <textarea placeholder="送信" name="comment"></textarea>
                        <button class='btn-post'>返信</button>
                    </form>
                </section>
                @foreach($tweet->comments->reverse() as $comment)
                <div class='comment-contener'>
                    <div class="comment-header">
                        <form action="{{route('profile')}}" method="POST">
                            <span>
                                <input type="hidden" name="user_id" value='{{  $comment->user_id }}'>
                                <button class="btn-name" onclick="event.stopPropagation()">{{ $comment->user->name }}</button>
                            </span>
                        </form>
                    </div>
                    <p>{{$comment->created_at}}</p>
                    <hr>
                    <div class="comment">{{ $comment->comment }}</div>
                    @if ($comment->user_id === Auth::id())
                    <form action="{{route('comment.delete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$comment->id}}">
                        <button class='btn-delete' onclick="event.stopPropagation()">削除</button>
                    </form>
                    @endif
                </div>
                @endforeach($tweet->comments as $comment)
            </div>
        </div>
    </section>
    @endforeach


    <script>
        document.querySelectorAll('.twi-item').forEach(item => {
            item.addEventListener('click', () => {
                const comments = item.querySelector('.twi-comments');
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