<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsAttended extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct()
    {
        $this->middleware('permission:update_student')->only('__invoke');
    }
    public function __invoke($id)
    {
        $status=DB::table('students_attends_lessons')->insert(
            [
                'student_id'=>$id,
                'created_at'=>Carbon::now(),
                'updated_at'=>carbon::now(),
            ]
        ) ;
        if($status )
        {
            return 'user has successfully attended' ;
        }
    
    }
}
