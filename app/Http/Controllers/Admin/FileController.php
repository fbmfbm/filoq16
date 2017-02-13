<?php

namespace App\Http\Controllers\Admin;
use App\Events\FileEntryAdded;
use App\Events\FileEntryDeleted;
use App\Events\FileEntryLoaded;
use App\FileSection;
use Event;
use App\Events\FileEntryUpdated;
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

        if($user->cannot("display_file"))
        {
            return view('no_access');
        }

        $files = Storage::disk('local')->allFiles('public/annexes/');
        $totalFileSize = 0;
        foreach ($files as $key => $file) {
            $totalFileSize += Storage::size($file);
        }

        $refFiles = FileEntry::all()->sortBy('name');


        return view('admin.files.index', ['files'=>$files, 'ref_files'=>$refFiles, 'total_files_size'=>$totalFileSize]);
    }

    public function create()
    {
        $sections = FileSection::where('active', true)->orderBy('id', 'asc')->get();

        return view('admin.files.create', ['sections'=>$sections]);
    }

    public function edit($id)
    {

        $file = FileEntry::findOrFail($id);

        return view('admin.files.edite')->with('file', $file);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $file = FileEntry::findOrFail($id);

        $file->short_title = $request->title;
        $file->description = $request->description;
        $file->rubrique_id = $request->section;
        $file->save();

        // redirect
        session()->flash('status', 'Votre enregistrement à bien été actualisé !');
        return \Redirect::to('/admin/file');
    }

    public function show($id)
    {

        $file = FileEntry::findOrFail($id);

        return view('admin.files.edite')->with('file', $file);
    }


    public function store(Request $request)
    {
        //$request->filefield =  $request->filefield->getClientOriginalExtension();
        $this->validate($request, [
            'name' => 'required|unique:files,name|max:255',
            'title' => 'required|max:255',
            //'filefield' => 'required|max:10000||mimes:jpeg,jpg,bmp,png,gif,pdf,csv,txt,xls,xlsx,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,doc,dot,ods'
            'filefield' => 'required|max:10000'
        ]);
        $fileData = $request->all();
        $file =  $request->filefield;


        Storage::put('public/annexes/'.$file->getClientOriginalName(),  File::get($file) );

        $entry = new FileEntry();
        $entry->name = $request->name;
        $entry->short_title = $request->title;
        $entry->description = $request->description;
        $entry->rubrique_id = $request->section;
        $entry->path = 'public/annexes/';
        $entry->mime = $file->getClientOriginalExtension();
        $entry->type = $file->getClientOriginalExtension();
        $entry->size = $request->size;
        $entry->active = 1;
        $entry->level= 0;
        $entry->owner= Auth::user()->id;

        $entry->save();

        event(new FileEntryAdded($entry));

        return redirect('admin/file');
    }

    public function destroy($id)
    {

        $file = FileEntry::findOrFail($id);

        Storage::delete('public/annexes/'.$file->name);

        event(new FileEntryDeleted($file));
        $file->delete();

        session()->flash('status', 'Votre enregistrement à bien été supprimé !');

        return back();
    }

    public function toggl_visible($id)
    {
        $file = FileEntry::findOrFail($id);
        ($file->active == true) ? $file->active = false: $file->active = true;
        $file->save();
        return redirect('admin/file');
    }

    public function get($filename)
    {
       // $entry = FileEntry::where('name', '=', $filename)->firstOrFail();
        $file_path = storage_path()."/app/public/annexes/".$filename;

        if ( file_exists( $file_path ) ) {
            // Send Download
            event(new FileEntryLoaded($filename));
            return response()->download($file_path);
        } else {
            // Error
            exit( 'Le fichier demandé n\'existe pas sur notre serveur !' );
        }
    }


}