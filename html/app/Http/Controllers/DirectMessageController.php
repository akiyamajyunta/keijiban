<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DirectMessage;
use OpenAI;



class DirectMessageController extends Controller
{

    //メッセージをやり取りした相手を表示
    public function contact(Request $request)
    {
// recipient_user_id
        $userId = Auth::id();
        $recipient = (int) $request->input('recipient_id');
        // dd($recipient);

        // 自分が送信者または受信者になっている全メッセージ
        $messages = DirectMessage::where('sender_id', $userId)
            ->orWhere('recipient_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // dd($lastMessage);
        $threads = $messages->map(function ($message) use ($userId) {
            return $message->sender_id === $userId ? $message->recipient : $message->sender;
        })->unique('id');

        // dd($threads);

        return view('main/contact', compact('threads'));
    }

    //DM、会話内容の表示
    public function index(Request $request)
    {
        $userId = Auth::id();
   
        $recipient = (int) $request->input('recipient_id');
        $recipient_name = $request->input('recipient_name');
        $recipient_user_id = $request->input('recipient_user_id');

        //自動生成時に受け取り。
        $make_talk = $request->input('make_talk');

        $messages = DirectMessage::where(function ($query) use ($userId, $recipient) {
            $query->where('sender_id', $userId)
                ->where('recipient_id', $recipient);
        })->orWhere(function ($query) use ($userId, $recipient) {
            $query->where('sender_id', $recipient)
                ->where('recipient_id', $userId);
        })->orderBy('created_at', 'asc')->get();
        //相手の最後のメッセージを取得
        $lastReceivedMessage = $messages->where('sender_id', $recipient)
            ->where('recipient_id', $userId)
            ->last();

        //相手が話してないのなら自分で話題を作る
        if (empty($lastReceivedMessage)) {
            $lastReceivedMessage = new \stdClass();
            $lastReceivedMessage->message = '話題を作ってください。完全に任せます。';
        }

        //自動返信を使用しなければ空を渡す
        if(empty($make_talk)){
            $make_talk = '';
        }

        return view('main.message', compact('messages', 'recipient', 'recipient_name', 'lastReceivedMessage','make_talk','recipient_user_id'));
    }
    // last_message

    //返信メッセージの作製、AIを使って。[与太]の部分
    public function make(Request $request)
    {
        $recipient = (int) $request->input('recipient_id');
        $recipient_name = $request->input('recipient_name');
        $lastReceivedMessage = $request->input('last_message');
        $recipient_user_id = $request->input('recipient_user_id');
        
        $api_key = env('OPENAI_API_KEY');
        $client = OpenAI::client($api_key);

        $response = $client->chat()->create([
            'model' => 'gpt-4o', // または gpt-3.5-turbo
            //content はGTP先生に話したい内容を記述。$lastReceivedMessageは相手が最後に話した内容
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $lastReceivedMessage
                        . 'これはダイレクトメッセージの返信。（なければ自身で新しい話題を作製）なのでうまく返信内容を作製して'
                        . '文字数は120字以内で'
                ]
            ],
        ]);

        $make_talk = $response->choices[0]->message->content;
    
        return redirect()->route('directMessages', ['make_talk' =>  $make_talk,
                                                    'recipient_id'=>$recipient,
                                                    'recipient_name' =>  $recipient_name,
                                                    'recipient_user_id'=> $recipient_user_id]);
    }

    // メッセージの保存（投稿処理）
    public function store(Request $request)
    {
        $recipient = (int) $request->input('recipient_id');
        $recipient_name = $request->input('recipient_name');
        $recipient_user_id = $request->input('recipient_user_id');

        $validator = Validator::make(
            $request->all(),
            [
                'message' => ['required', 'max:140'],
            ],
            [
                'message.required' => 'メッセージを入力してください',
                'message.max'      => '140文字以内にしてください',
            ]
        );

        if ($validator->fails()) {

            $allErrors = $validator->errors()->all();

            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }

        DirectMessage::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $recipient,
            'recipient_user_id' => $recipient_user_id,
            'message' =>  $request->input('message'),
            'name' => $recipient_name,
        ]);

        return redirect()->route(
            'directMessages',
            [
                'recipient_id' => $recipient,
                'recipient_name' => $recipient_name,
                'recipient_user_id' =>  $recipient_user_id,
            ]
        );
    }
}
