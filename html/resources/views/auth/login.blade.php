{{-- @include('parts.header') --}}
@include('parts.header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <title>ログイン</title>
</head>

<body>

    <div class="container-parson">
        <div class="container">
                    @error('message')
                    <div class="text-danger">{{ $message }}</div>
                    <hr>
                    @enderror
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="input-from">
                    <label class="form-label" for="email">メールアドレス</label>

                    <input id="email" class="form-control" name="email" type="email" value="{{old('email')}}"
                        autofocus />
                </div>

                <div class="input-from">
                    <label class="form-label" for="password">パスワード</label>
                    <input id="password" class="form-control" name="password" type="password" />
                </div>

                <div>
                    <input id="remember" class="form-check-input" name="remember" type="checkbox" />
                    <label class="" for="remember">ログイン情報を記憶する</label>
                </div>
                <button type="submit" class="btn-auth">ログイン</button>
            </form>

            <div>
                <a href="{{route('newPage')}}" class="btn btn-outline-secondary mx-2">戻る</a>
            </div>
        </div>
    </div>
</body>

</html>