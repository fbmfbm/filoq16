<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Http\Request;

use App\Http\Requests;

class RessourcesController extends Controller
{
    public function index()
    {
        $files = FileEntry::all();
        return view('sections/ressource',['files' => $files] );
    }
}
