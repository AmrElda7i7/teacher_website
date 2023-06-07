<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_exam')->only('create');
        $this->middleware('permission:update_exam')->only('edit');
        $this->middleware('permission:delete_exam')->only('destroy');
        $this->middleware('permission:view_exams')->only('index');
    }
    public function index()
    {
        $exams =Exam::all();
        return view('exams.exams',compact('exams'));
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
            'exam_name' => 'required|unique:exams',
            'exam_marks'=>'required|numeric|max:100'
            ]
            );
       Exam::create(
        [
            'exam_name'=>$request->exam_name,
            'mark'=>$request->exam_marks
        ]
       );
       return redirect()->route('home');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $exam= Exam::where('id',$id)->first();
        return view('exams.edit',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'exam_name'=>'required|unique:exams,exam_name,'.$id,
                'exam_marks'=>'required|numeric|max:100'
            ]
            );
        Exam::where('id',$id)->update(
            [
                'exam_name'=>$request->exam_name,
                'mark'=>$request->exam_marks,
            ]
        );
        return redirect()->route('exams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
