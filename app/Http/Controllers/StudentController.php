<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Group;
use App\Models\Quiz;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_student')->only('create');
        $this->middleware('permission:delete_student')->only('destroy');
        $this->middleware('permission:update_student')->only(['edit','attends']);
    }
    public function index()
    {
        $students =Student::all();
        return view('students.all_students',compact('students'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups= Group::all();
        return view('students.create',compact('groups'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name'=>'required',
            'parent_number'=>'required|max:11|unique:students',
            'student_number'=>'required|max:11|unique:students',
            'groups'=>'required',
        ]);
   $id= Student::create(
        [
            'name'=>$request->student_name ,
            'parent_number'=>$request->parent_number ,
            'student_number'=>$request->student_number ,
            'group_id'=>$request->groups ,  
        ]
    )->id;
    $route = route('user_attended',$id);
    $qr = QrCode::size(300)->generate($route);
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('students.student_details',compact('id')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $student=Student::where('id',$id)->first();
        $groups=Group::where('id','!=',$student->group_id)->get();
        return view('students.edit',compact('student','groups'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                'student_name'=>'required',
                'parent_number'=>'required|max:11|unique:students,parent_number,'.$id,
                'student_number'=>'required|max:11|unique:students,student_number,'.$id,
                'groups'=>'required',
            ]
        );
        Student::where('id',$id)->update(
            [
                'name'=>$request->student_name,
                'parent_number'=>$request->parent_number,
                'student_number'=>$request->student_number,
                'group_id'=>$request->groups,
            ]
            );
            return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Student::where('id',$id)->delete();
        return redirect()->back();
    }
    public function find_student (Request $request)
    {   
        if($request->admin)
        {
            $student=Student::where('id',$request->data)->first();
        }else{

            $student=Student::where('parent_number',$request->data)->first();
        }
        return view('students.student_report')->withDetails($student);
    }
    public function attends($id)
    {
        DB::table('students_attends_lessons')->insert(
            [
                'student_id'=>$id,
                'created_at'=>Carbon::now(),
                'updated_at'=>carbon::now(),
            ]
        ) ;
        return redirect()->back();
    }
    public function view_mark_form()
    {
        $quizzes=Quiz::all();
        $students= Student::all();
        $exams=Exam::all();
        return view('students.add_mark',compact(['quizzes','exams','students'])) ;
    }
    public function add_mark(Request $request)
    {
        if($request->exams)
        {
            $request->validate(
                [
                    'mark'=>'required|numeric'
                ]
            );
            DB::table('table_students_exams')->insert([
                'student_id'=>$request->students,
                'exam_id'=>$request->exams,
                'mark'=>$request->mark,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
            return redirect()->back();
        }else{
            $request->validate(
                [
                    'mark'=>'required|numeric'
                ]
            );
            DB::table('table_students_quizzes')->insert([
                'student_id'=>$request->students,
                'quiz_id'=>$request->quizzes,
                'mark'=>$request->mark,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
            return redirect()->back();
        }
    }
    public function details(Request $request)
    {
    
    $first=$request->month;
    $last =Carbon::createFromDate($request->month)->lastOfMonth();
    if( $last->diffInDays(Carbon::now(),false)<0)
    {
        $message='there is no data';
        return view('students.details',compact('message'));

    }else{

        $student=Student::where('id',$request->id)->first();
        $exams=DB::table('table_students_exams')->where('student_id',$request->id)
        ->whereBetween('created_at',[$first,$last])
        ->orderBy('created_at')->get();
        $quizzes=DB::table('table_students_quizzes') ->where('student_id',$request->id)
        ->whereBetween('created_at',[$first,$last])
        ->orderBy('created_at')->get();
        $count=DB::table('students_attends_lessons')->where('student_id',$request->id)
         ->whereBetween('created_at',[$first,$last])->orderBy('created_at')->count();
        return view('students.details',compact(['student','exams','quizzes','count']));
    }

    }
}
