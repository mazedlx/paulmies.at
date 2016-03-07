<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ResizesImages;
use Session;

class SlideController extends Controller
{
    use ResizesImages;

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
        $slide->filename = $this->createSlideAndThumbnail($request->file('file'));
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
        unlink(public_path('uploads/slides/' . $slide->filename));
        unlink(public_path('uploads/slides/thumb_' . $slide->filename));
        $slide->delete();
        Session::flash('msg_body', 'Slide wurde entfernt.');
        return redirect('/admin/slides');
    }
}
