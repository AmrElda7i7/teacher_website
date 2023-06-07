<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Exam_and_quiz extends Controller
{
    /**
     * Handle the incoming request.
     */
    /*
    quizzes and exams view 
    add student's marks
    
    */
    public function __invoke(Request $request)
    {
        return view('exams_and_quizzes');
    }
}
