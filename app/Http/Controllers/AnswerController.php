<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\User;
use Auth;

class AnswerController extends Controller
{
    public function index() {
        $userId = Auth::id();

        $answers = Answer::whereHas('user', function($query) use ($userId){
            return $query->where('user_id', '=', $userId);
        })->with('question', 'option')->get();

        return view('answer', ['answers'=>$answers]);
    }

    public function create(Request $request) {
        $request->validate([
            'answers' => 'required'
        ]);

        $userId = Auth::id();
        foreach ($request->answers as $key => $value) {
            Answer::updateOrCreate(
                [
                    "user_id" => $userId,
                    "question_id" => $key
                ],
                [   
                    "option_id" => $value
                ]
            );
        }
        
        $user = User::find($userId);

        $user->is_followed = 1;
        $user->save();
        
        return redirect('home/answers');
    }
}
