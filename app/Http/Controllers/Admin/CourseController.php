<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Content;
use Auth;

class CourseController extends Controller
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
        $courses = Course::where('user_id', Auth::User()->id)->get();
        $coursesCount = Course::where('user_id', Auth::User()->id)->count();
        // dd($coursesCount);
        return view('admin.manageCourse',['courses'=>$courses],['coursesCount' => $coursesCount]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createCourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect ('/admin/manageCourse')->with('success','Materi baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::where('id', $id)->get();
        $contents = Content::where('course_id', $id)->get();
        return view('admin.courseDetail',['courses' => $courses], ['contents'=>$contents]);
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
        $course = Course::find($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
        return back()->with(['success' => 'Data Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $content = Content::where('course_id',$id);
        $course->delete();
        
        return redirect('/admin/manageCourse')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function hide($id){
        $course = Course::find($id);
        $course->status= 0;
        $course->save();
        return redirect('/admin/manageCourse')->with(['success' => 'Mata Pelajaran Berhasil Disembunyikan!']);
    }

    public function unhide($id){
        $course = Course::find($id);
        $course->status= 1;
        $course->save();
        return redirect('/admin/manageCourse')->with(['success' => 'Mata Pelajaran Berhasil Ditampilkan!']);
    }
}
