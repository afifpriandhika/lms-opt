<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\EnrolledCourse;
use App\Models\Content;
use Auth;
use DB;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::where('status',1)->get();
        $coursesCount = Course::where('status',1)->count();
        // dd($coursesCount);
        return view('user.course',['courses'=>$courses],['coursesCount' => $coursesCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::where('id',$id)->get();
        $contents = Content::where('course_id',$id)->where('status',1)->get();
        return view ('user.content',['courses' => $courses],['contents' => $contents]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enroll(Request $request, $id)
    {
        $enrollment = $request->enrollment;
        $course = Course::find($id);
        $enrolled = DB::table('enrolled_courses')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('course_id', '=', $course->id)
                    ->count();
        // dd($enrolled);
        if($enrollment == $course->enrollment_key){
            if ($enrolled == 0){
                    $enrolled = EnrolledCourse::create([
                        'user_id' => Auth::user()->id,
                        'course_id' => $course->id
                ]);
                return redirect('/course')->with('success',"mata pelajaran berhasil diambil");
            }
            else{
                return redirect('/course')->with('warning',"mata pelajaran sudah diambil");
                
            }
        }
        else{
            return redirect('/course')->with('error',"enrollment key salah");
        }
    }
}
