<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('guest');  // ログインしていないユーザーのみがアクセス可能
    // }

    /**
     * ログインフォームを表示する
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * ユーザーのログイン処理を実行する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. リクエストのデータを検証する
        // $credentials = $request->validate(
        //password
        $validator = Validator::make(
            $request->all(),
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'メールアドレスを入力してください',
                'email.email' => '正しいメールアドレス形式で入力してください',
                'password.required' => 'パスワードを入力してください',
            ]
        );

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }

        // 2. 認証を試みる
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // 認証に成功したら、セッションを再生成する
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        } //成功。ここは弄らない

        // 認証に失敗した場合は、ログインページにリダイレクトする
        return back()->withErrors([
            'message' => 'ログイン情報が正しくありません。',
        ])->onlyInput('message');
    }
}
