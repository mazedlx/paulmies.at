<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use App\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ResizesImages;
use Image;
use Session;

class UploadController extends Controller
{
    use ResizesImages;

    /**
     * Load auth middleware
     * @access public
     */
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
        $uploads = Upload::orderBy('sort', 'asc')->paginate();

        return view('uploads.index')
            ->with('uploads', $uploads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contents = Content::orderBy('title', 'asc')->get()->pluck('title', 'id');

        return view('uploads.create')
            ->with('contents', $contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sort = 0;
        foreach ($request->file('files') as $file) {
            $upload = Upload::create([
                'content_id' => $request->content_id,
                'description' => $request->description,
                'filename' => $this->createImageAndThumbnail($file),
                'sort' => $sort
            ]);
            $sort++;
        }
        Session::flash('msg_body', 'Bild(er) wurde(n) angelegt.');
        return redirect('/admin/uploads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('uploads.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload = Upload::findOrFail($id);
        $contents = Content::orderBy('title', 'asc')->get()->pluck('title', 'id');

        return view('uploads.edit')
            ->with('upload', $upload)
            ->with('contents', $contents);
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
        $upload = Upload::findOrFail($id);
        $upload->update($request->all());

        Session::flash('msg_body', 'Gespeichert.');
        return redirect('/admin/uploads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);
        unlink(public_path('uploads/' . $upload->filename));
        unlink(public_path('uploads/thumb_' . $upload->filename));
        $upload->delete();
        Session::flash('msg_body', 'Bild wurde entfernt.');
        return redirect('/admin/uploads');
    }
}
