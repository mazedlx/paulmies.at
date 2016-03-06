<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('administration.index');
    }

    public function contents()
    {
        $contents = Content::orderBy('sort', 'asc')->get();
        return view('contents.index')
            ->with('contents', $contents);
    }
}
