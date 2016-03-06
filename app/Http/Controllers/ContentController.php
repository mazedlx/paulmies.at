<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Content;
use App\Http\Requests;
use App\Slide;
use Illuminate\Http\Request;
use Mail;
use Session;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'update', 'edit', 'destroy', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::with('uploads')->orderBy('sort', 'asc')->get();
        $configs = Configuration::all()->pluck('value', 'config');
        $slides = Slide::orderBy('sort', 'asc')->get();

        return view('main')
            ->with('contents', $contents)
            ->with('configs', $configs)
            ->with('slides', $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Content::create($request->all());
        $content->attribute = str_slug($request->title);
        $content->save();
        Session::flash('msg_body', 'Inhalt wurde angelegt.');
        return redirect('/admin/contents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);

        return view('contents.edit')
            ->with('content', $content);
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
        $content = Content::findOrFail($id);
        $content->attribute = str_slug($request->title);
        $content->update($request->all());
        Session::flash('msg_body', 'Gespeichert.');
        return redirect('/admin/contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        $content->uploads()->delete();
        $content->delete();

        Session::flash('msg_body', 'Inhalt wurde entfernt.');
        return redirect('/admin/contents');
    }

    public function inquiry(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'inquiry' => $request->message
        ];
        Mail::send('mails.inquiry', $data, function ($message) {
            $message->from('office@paulmies.at', 'Website-Anfrage');
            $message->to(Configuration::config('email')->get()->first()->value, Configuration::config('name')->get()->first()->value);
            $message->subject('Website-Anfrage');
        });
        Session::flash('msg_title', 'Wir haben Ihre Nachricht erhalten!');
        Session::flash('msg_body', 'Wir werden uns umgehend bei Ihnen melden.');
        return redirect('/#kontaktformular');
    }
}
