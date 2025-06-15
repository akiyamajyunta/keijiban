<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tweet;
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
     * 新しいユーザーインスタンスを作成し、保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 1. リクエストのデータを検証する
        $request->validate([//ここ、エラー処理を記入する
            'name' => ['required', 'string', 'max:255'],
            'profile' => ['nullable', 'string', 'max:255'],
            'userId' => ['required', 'string', 'max:255', 'unique:users','regex:/^@[A-Za-z0-9_]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. 新しいユーザーを作成する
        $user = User::create([
            'name' => $request->name,
            'profile' => $request->profile,
            'userId' => $request->userId,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. ユーザー登録イベントを発行する
        event(new Registered($user));

        // 4. ユーザーをログインさせる
        Auth::login($user);

        // 5. ダッシュボードページにリダイレクトする
        return redirect()->route('home');
    }
//名前の変更
    public function rename(Request $request){

            $user = Auth::user();
            $user->name = $request->get('name');
            $user->save();  
            $user_id = Auth::id();
            Tweet::where('user_id',$user_id)->update(['name' => $request->get('name')]);
            return redirect()->route('option');
    } //名前の変更

    public function reProfile(Request $request){
    $validator = Validator::make($request->all(), [
        'profile' => ['max:140'],
        ], 
    [
        'profile.max'      => '15文字以内にしてください',
    ]);

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
    }
            $user = Auth::user();
            $user->profile = $request->get('profile');
            $user->save();  
            $user_id = Auth::id();
            User::where('user_id',$user_id)->update(['profile' => $request->get('profile')]);
            return redirect()->route('option');
    }


    //paswordの変更
    public function rePassword(Request $request){
        {
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        if( $password !=$password_confirmation){
            return back()->withErrors([
            'message' => 'パスワードが一致しません',
        ])->onlyInput('message');
        }
            $user = Auth::user();
            $user->password = Hash::make($request->get('password'));
            $user->save();  
            

        return redirect()->route('option');
    }
}  
    //useIdの変更
    public function reUserId(Request $request){
    $validator = Validator::make($request->all(), [
        'userId' => ['required', 'string', 'max:15', 'unique:users', 'regex:/^@[A-Za-z0-9_]+$/'],
        ], 
    [
        'userId.required' => 'ユーザーIDを入力してください',
        'userId.string'   => '文字列で入力してください。',
        'userId.max'      => '15文字以内にしてください',
        'userId.unique'   => 'すでに使用されてます。',
        'userId.regex'    => '「@」から始まり、英数字とアンダースコアのみで構成してください。',
    ]);

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
    }
        $user = Auth::user();
        $user->userId = $request->input('userId');
        $user->save();
        
        return redirect()->route('option');
        }  
    }
