<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectMessage;
use Illuminate\Support\Facades\Auth;


class DirectMessageController extends Controller
{
    // ダイレクトメッセージの一覧表示
    public function index(Request $request)
    {
        $user = Auth::user();

        // 自分が送信または受信したメッセージを取得
        $messages = DirectMessage::where('sender_id', $user->id)
                        ->orWhere('recipient_id', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();
        // dd($messages);
        return view('main.message', compact('messages'));
        // return view('main.message');
    }

    // ダイレクトメッセージの保存

    public function store(Request $request)
    {   
 
        $data = $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'message'      => 'required|string|max:1000'
        ]);

        $data['sender_id'] = Auth::id();

        DirectMessage::create($data);
        return redirect()->route('directMessages');
    }
}


