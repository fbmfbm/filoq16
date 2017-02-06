<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Gate;
use App\FileEntry;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $files = Storage::disk('local')->allFiles();

        /*
        if($user->cannot("display_role"))
        {
            return view('no_access');
        }
        */
        return view('admin.files.index', ['files'=>$files]);
    }

    public function create()
    {

        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $fileData = $request->all();
        $file =  $request->filefield;

        Storage::put('public/'.$file->getClientOriginalName(),  File::get($file) );

        $entry = new FileEntry();
        $entry->name = $request->name;
        $entry->short_title = $request->title;
        $entry->description = $request->description;
        $entry->rubrique_id = 0;
        $entry->path = 'public/';
        $entry->mime = $request->type;
        $entry->type = $request->type;
        $entry->size = $request->size;
        $entry->active = 1;
        $entry->level= 0;
        $entry->owner= Auth::user()->id;

        $entry->save();

        return redirect('admin/file');
    }


}