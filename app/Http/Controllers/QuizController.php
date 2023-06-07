<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_quiz')->only('create');
        $this->middleware('permission:update_quiz')->only('edit');
        $this->middleware('permission:delete_quiz')->only('destroy');
        $this->middleware('permission:view_quizzes')->only('index');
    }
    public function index()
    {
        $quizzes =Quiz::all();
        return view('quizzes.quizzes',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'quiz_name'=>'required|unique:quizzes',
                'quiz_marks'=>'required|numeric|max:100'
            ]
            );
            Quiz::create(
                [
                    'quiz_name'=>$request->quiz_name,
                    'mark'=>$request->quiz_marks,
                ]
            );
            return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $quiz= Quiz::where('id',$id)->first();
    return view('quizzes.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'quiz_name'=>'required|unique:quizzes,quiz_name,'.$id,
                'quiz_marks'=>'required|numeric|max:100'
            ]
            );
        Quiz::where('id',$id)->update(
            [
                'quiz_name'=>$request->quiz_name,
                'mark'=>$request->quiz_marks,
            ]
        );
        return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Quiz::where('id',$id)->delete();
        return redirect()->back();
        
    }
}
