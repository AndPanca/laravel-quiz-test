<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Question;
use File;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::get();
        return view('question', ['questions' => $questions]);
    }

    public function create()
    {
        return view('questionCreate');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        // Get All data
        $data = $request->all();
        $image = $request->file('image');
        
        // Get name profile file exp: image.jpg
        $fileName = time()."_".$image->getClientOriginalName();

        $image->move('images',$fileName);

        $data['image'] = $fileName;
        
        Question::create($data);

        return redirect('dashboard/questions');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        // Delete File
        File::delete('images/'.$question->image);

        //Delete data on database
        $question->delete();

        return redirect()->back();
    }
}
