<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Option;

class OptionsController extends Controller
{
    public function index($id) {
        $question = Question::find($id);
        $option = Option::query();

        $option->when($id, function($query) use ($id){
            return $query->where('question_id', '=', $id);
        });

        return view('options', ['question'=>$question, 'option'=>$option->get()]);
    }

    public function create(Request $request, $id) {
        $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.is_correct' => 'required|boolean',
        ]);

        foreach ($request->addmore as $key => $value) {
            $value['question_id'] = $id;
            Option::create($value);
        }
        return redirect()->back();
    }

    public function destroy($id) {
        // Delete File
        $option = Option::find($id);

        //Delete data on database
        $option->delete();

        return redirect()->back();
    }
}
