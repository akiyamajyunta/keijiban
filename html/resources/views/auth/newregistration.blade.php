<!-- @include('parts.header') -->
    <h2 class="text-center mb-4">ユーザー登録</h2>
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ユーザー名</label>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input id="name" type="text" name="name" class="form-control" value="" >
        </div>
<!-- 課題１なまえを空欄にすると以前登録した奴がパスワードもろとも出てくる -->
        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input id="email" type="email" name="email" class="form-control" value="">
        </div>

        <div class="mb-3">
            <label for="userId" class="form-label">ユーザーID</label>
            @error('userId')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input id="userId" type="text" name="userId" class="form-control" value="">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input id="password" type="password" name="password" class="form-control" value="">
        </div>

        <div class="mb-3">
            <label for="password-confirm" class="form-label">パスワード確認</label>
            @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" value="">
        </div>

        <button type="submit" class="btn btn-primary w-100">登録</button>
    </form>
    <div class="mt-3 d-flex justify-content-center">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mx-2">戻る</a>
    </div>
