<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Attachment::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'attach_desc' => 'required',
            'attach_type' => 'required',
            'attach_file' => 'required|file|max:512'
        ]); 
        if ($file = $request->file('attach_file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
 
            //store your file into directory and db
            $save = new Attachment();
            $save->course_id = $request->input('course_id');
            $save->attach_desc = $request->input('attach_desc');
            $save->attach_type = $request->input('attach_type');
            $save->attach_name = $name;
            $save->attach_file = $path;
            $save->save();
              
            return Attachment::paginate(10);
        }  
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
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Attachment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'attach_desc' => 'required',
            'attach_type' => 'required',
            'attach_file' => 'required|file|max:512'
        ]);

        if ($file = $request->file('attach_file')) {
            $attachment = Attachment::find($id);
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
            $attachment->course_id = $request->input('course_id');
            $attachment->attach_desc = $request->input('attach_desc');
            $attachment->attach_type = $request->input('attach_type');
            $attachment->attach_name = $name;
            $attachment->attach_file = $path;
            $attachment->save();
            return Attachment::paginate(10);
        } else {
            $attachment = Attachment::find($id);
            $attachment->course_id = $request->input('course_id');
            $attachment->attach_desc = $request->input('attach_desc');
            $attachment->attach_type = $request->input('attach_type');
            $attachment->attach_name = $attachment->attach_name;
            $attachment->attach_file = $attachment->attach_file;
            $attachment->save();
            return Attachment::paginate(10);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attachment = Attachment::find($id);
        $attachment -> delete();
        return Attachment::paginate(10);
    }
}
