<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Course;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $courses = Course::where('id', $id)->get();
        // dd($courses);
        return view('admin.createContent', ['courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->file){
            $course = Content::create([
                'course_id' => $request->course_id,
                'name' => $request->name,
                'description' => $request->description,
                'material' => $request->material,
                'video' => $request->video,
            ]);
        }
        else{
            $request->validate([
                'file' => 'mimes:pdf',
            ]);
        
            $fileName = time().'.'.$request->file->extension();  
            $request->file->move(public_path('pdf_uploads'), $fileName);
    
            $course = Content::create([
                'course_id' => $request->course_id,
                'name' => $request->name,
                'description' => $request->description,
                'material' => $request->material,
                'video' => $request->video,
                'file' => $fileName,
            ]);
        }
        return back()->with('success','Kontent baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contents=Content::where('id',$id)->get();

        return view('admin.contentDetail',['contents'=>$contents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents=Content::where('id',$id)->get();

        return view('admin.editContent',['contents'=>$contents]);
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
        $content = Content::find($id);

        $content->name = $request->name;
        $content->description = $request->description;
        $content->material = $request->material;
        $content->video = $request->video;
        $content->save();

        return back()->with('success','Konten berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        $content->delete();

        return back()->with('success','Kontent berhasil dihapus!');
    }

    public function destroyFile($id)
    {
        $content = Content::find($id);

        $content->file=null;
        $content->save();

        return back()->with('success','File berhasil dihapus!');
    }

    public function updateFile(Request $request, $id)
    {
        $content = Content::find($id);

        $fileName = time().'.'.$request->file->extension();  
        $request->file->move(public_path('pdf_uploads'), $fileName);

        $content->file=$fileName;
        $content->save();

        return back()->with('success','File berhasil diperbarui!');
    }

    public function pdfView($id){

        $file=Content::select('file')->where('file',$id)->get();
        // dd($file);
        $path = public_path('/pdf_uploads'.'/'. $id);
        // dd($path);

        return response()->file($path);
    }

    public function hide($id){
        $content = Content::find($id);
        $content->status= 0;
        $content->save();
        return back()->with(['success' => 'Mata Pelajaran Berhasil Disembunyikan!']);
    }

    public function unhide($id){
        $content = Content::find($id);
        $content->status= 1;
        $content->save();
        return back()->with(['success' => 'Mata Pelajaran Berhasil Ditampilkan!']);
    }
}
