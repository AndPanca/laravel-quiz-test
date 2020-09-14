<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::get();
        return view('user', ['users' => $users]);
    }

    public function create()
    {
        return "create";
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return "show";
    }

    public function edit($id)
    {
        return "edit";
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
