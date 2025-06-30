<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

use OpenAI;

class TimelineController extends Controller
{
    public function store(Request $request)
    {

        $talk =  $request->input('talk');
        $request->validate([
            'content' => 'required|max:140'
        ]);

        Tweet::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'content' => $request->content,
        ]);


        return redirect()->route('home', ['talk' => $talk]);
    }

    public function make()
    {

        // $talk =  'コミュ強太郎です。自動でつぶやきます';
        $api_key = env('OPENAI_API_KEY');
        $client = OpenAI::client($api_key);

        $response = $client->chat()->create([
            'model' => 'gpt-4o', // または gpt-3.5-turbo
            //content はGTP先生に話したい内容を記述
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'これはtweeterです。何か話題やつぶやきを作って。ハッシュタグは無し。どこかに行くのも無し'
                        . '文字数は120字以内で'
                ]
            ],
        ]);

        $talk = $response->choices[0]->message->content;

        return redirect()->route('home', ['talk' => $talk]);
    }

    public function delete(Request $request)
    {
        $tweetId = $request->input('id');
        $tweet = Tweet::findOrFail($tweetId);

        if (Auth::id() !== $tweet->user_id) {
            redirect()->back();;
        }

        // ツイートを削除
        $tweet->delete();

        return redirect()->back();
    }
}
