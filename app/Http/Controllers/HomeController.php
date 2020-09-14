<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware(function ($request, $next) {
            $userId = Auth::id();
            $user = User::find($userId);
            if ($user->is_followed == 1) {
                return redirect('home/answers');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $question = Question::with('options')->get();
        return view('home', ['question'=>$question]);
    }

    public function handleAdmin()
    {
        $question = Question::with('options')->get();
        return view('handleAdmin', ['question'=>$question]);
        // return view('handleAdmin');
    }
}
