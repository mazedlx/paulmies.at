<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use App\Upload;
use Illuminate\Http\Request;
use Image;
use Session;

class UploadController extends Controller
{
    protected $storagePath = 'uploads';
    protected $imageWidth = 1920;
    protected $thumbWidth = 300;

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
            $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->guessClientExtension();
            $path = public_path($this->storagePath . '/' . $filename);
            $thumb = 'thumb_' . $filename;
            $thumb_path = public_path($this->storagePath . '/' . $thumb);
            Image::make($file->getRealPath())->widen($this->imageWidth)->save($path);
            Image::make($file->getRealPath())->fit($this->thumbWidth)->save($thumb_path);
            $upload = Upload::create([
                'content_id' => $request->content_id,
                'description' => $request->description,
                'filename' => $filename,
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
