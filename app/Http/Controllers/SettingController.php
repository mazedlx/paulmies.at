<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
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
        $configs = Configuration::all();
        return view('settings.index')
            ->with('configs', $configs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Configuration::findOrFail($id);

        return view('settings.edit')
            ->with('config', $config);
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
        $config = Configuration::findOrFail($id);
        $config->update($request->all());
        Session::flash('msg_body', 'Gespeichert.');
        return redirect('/admin/settings');
    }
}
