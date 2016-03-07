<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    /**
     * Load auth middleware
     *
     * @access public
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show administration index page
     *
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administration.index');
    }

    /**
     * Show available contents
     *
     * @access public
     * @return \Illuminate\Http\Response
     */
    public function contents()
    {
        $contents = Content::orderBy('sort', 'asc')->get();
        return view('contents.index')
            ->with('contents', $contents);
    }
}
