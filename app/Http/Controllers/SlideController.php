<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Slide;
use Illuminate\Http\Request;
use Image;
use Session;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::orderBy('sort', 'asc')->get();
        return view('slides.index')
            ->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = Slide::create($request->all());
        $file = $request->file('file');
        $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->guessClientExtension();
        $path = public_path('uploads/slides/' . $filename);
        $thumb = 'thumb_' . $filename;
        $thumb_path = public_path('uploads/slides/' . $thumb);
        Image::make($file->getRealPath())->widen(1600)->save($path);
        Image::make($file->getRealPath())->widen(300)->save($thumb_path);
        $slide->filename = $filename;
        $slide->save();
        Session::flash('msg_body', 'Slide wurde angelegt.');
        return redirect('/admin/slides');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return view('slides.edit')
            ->with('slide', $slide);
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
        $slide = Slide::findOrFail($id);
        $slide->update($request->all());
        Session::flash('msg_body', 'Gespeichert.');
        return redirect('/admin/slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        unlink(public_path('uploads/slides/' . $upload->filename));
        unlink(public_path('uploads/slides/thumb_' . $upload->filename));
        $slide->delete();
        Session::flash('msg_body', 'Slide wurde entfernt.');
        return redirect('/admin/slides');
    }
}
