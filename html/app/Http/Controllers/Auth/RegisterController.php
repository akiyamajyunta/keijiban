<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DirectMessage;
use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tweet;
// use Dom\Comment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * 登録フォームを表示する
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.newregistration');
    }

    /**
     * 新規登録、保存。     
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
    // 1. ルールとメッセージを定義
    $validator = Validator::make(
        $request->all(),
        [
            'name'     => ['required', 'string', 'max:100'],
            'profile'  => ['nullable', 'string', 'max:255'],
            'userId'   => [
                'required',
                'string',
                'max:255',
                'unique:users,userId',
                'regex:/^@[A-Za-z0-9_]+$/'
            ],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ],
        [
            'name.required'     => '名前は必須入力です。',
            'name.max'          => '名前は100文字以内で入力してください。',
            'profile.max'       => 'プロフィールは255文字以内で入力してください。',
            'userId.required'   => 'ユーザーIDは必須入力です。',
            'userId.unique'     => 'そのユーザーIDは既に使われています。',
            'userId.regex'      => 'ユーザーIDは「@」で始まり、英数字とアンダースコアのみ使用できます。',
            'email.required'    => 'メールアドレスは必須入力です。',
            'email.email'       => '有効なメールアドレスを入力してください。',
            'email.unique'      => 'そのメールアドレスは既に登録されています。',
            'password.required' => 'パスワードは必須入力です。',
            'password.confirmed'=> '確認用パスワードと一致しません。',
            'password.min'      => 'パスワードは8文字以上で入力してください。',
        ]
    );

    // 2. バリデーション失敗時の処理
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)   // エラー情報
            ->withInput();             // 入力値を保持
    }

    // 3. ユーザー作成
    $user = User::create([
        'name'     => $request->name,
        'profile'  => $request->profile,
        'userId'   => $request->userId,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // 4. 登録完了イベント発行→ログイン→リダイレクト
    event(new Registered($user));
    Auth::login($user);

    return redirect()->route('home');
}


    //名前の変更
    public function rename(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name'    => ['required', 'string', 'max:100'],
            ],
            [
                'name.required'  => '名前は必須入力です',
                'profile.max'      => '100文字以内にしてください',
            ]
        );

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->name = $request->get('name');
        $user_id = Auth::id();

        Tweet::where('user_id', $user_id)->update(['name' => $request->get('name')]);
        User::where('user_id', $user_id)->update(['name' => $request->get('name')]);
        Comment::where('user_id', $user_id)->update(['name' => $request->get('name')]);
        DirectMessage::where('user_id', $user_id)->update(['name' => $request->get('name')]);

        $user->save();
        return redirect()->route('option');
    } //名前の変更



    //プロフィールの変更
    public function reProfile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'profile' => ['max:140'],
            ],
            [
                'profile.max'      => '140文字以内にしてください',
            ]
        );

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->profile = $request->get('profile');
        $user->save();
        $user_id = Auth::id();
        User::where('user_id', $user_id)->update(['profile' => $request->get('profile')]);
        return redirect()->route('option');
    }


    //paswordの変更
    public function rePassword(Request $request)
    { {
            $password = $request->password;
            $password_confirmation = $request->password_confirmation;

            if ($password != $password_confirmation) {
                return back()->withErrors([
                    'message' => 'パスワードが一致しません',
                ])->onlyInput('message');
            }
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->password = Hash::make($request->get('password'));
            $user->save();


            return redirect()->route('option');
        }
    }
    //useIdの変更
    public function reUserId(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'userId' => ['required', 'string', 'max:15', 'unique:users', 'regex:/^@[A-Za-z0-9_]+$/'],
            ],
            [
                'userId.required' => 'ユーザーIDを入力してください',
                'userId.string'   => '文字列で入力してください。',
                'userId.max'      => '15文字以内にしてください',
                'userId.unique'   => 'すでに使用されてます。',
                'userId.regex'    => '「@」から始まり、英数字とアンダースコアのみで構成してください。',
            ]
        );

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user_id = Auth::id();
        $user->userId = $request->input('userId');
        // dd($request->input('userId'));

        // Tweet::where('user_id', $user_id)->update(['userId' => $request->get('userId')]);
        User::where('user_id', $user_id)->update(['userId' => $request->get('userId')]);
        DirectMessage::where('recipient_id', $user_id)->update(['recipient_user_id' => $request->get('userId')]);
        $user->save();

        return redirect()->route('option');
    }
}
