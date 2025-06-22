<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DirectMessage;

class DirectMessageController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $recipient = (int) $request->input('recipient_id');
        $recipient_name = $request->input('recipient_name');

    $messages = DirectMessage::where(function ($query) use ($userId, $recipient) {
        $query->where('sender_id', $userId)
            ->where('recipient_id', $recipient);
    })->orWhere(function ($query) use ($userId, $recipient) {
        $query->where('sender_id', $recipient)
            ->where('recipient_id', $userId);
    })->orderBy('created_at', 'asc')->get();
    
    return view('main.message', compact('messages', 'recipient', 'recipient_name'));
    }

    // メッセージの保存（投稿処理）
    public function store(Request $request)
    {
        $recipient = (int) $request->input('recipient_id');
        $recipient_name = $request->input('recipient_name');
        
        // バリデーションルール
        $data = $request->validate([
            'message' => 'required|max:140'    // 空も許容する場合は nullable、文字列で長さ制限
        ]);

        DirectMessage::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $recipient,
            'message' => $data['message'],
            'name'=>$recipient_name 
        ]);
        return redirect()->route('directMessages', 
        ['recipient_id' => $recipient, 
            'recipient_name' => $recipient_name 
    ]);
    }
}
