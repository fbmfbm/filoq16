<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Gate;

use App\LogStat;


class LogStatController extends Controller
{
    public function index()
    {
        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        $stats = LogStat::all();

        return view('admin.logstats.index')->with('stats',$stats);
    }

    public function store(Request $request)
    {
        

        $stats = LogStat::all();

        return view('admin.logasts.index')->with('stats',$stats);
    }



    public function create()
    {

        return view('admin.logstats.index');
    }


    public function update(Request $request, $id)
    {


    }

    public function show($id)
    {
        $stat = LogStat::findOrFail($id)->first();

        return view('admin.logstats.index')->with('stat', $stat);
    }

    public function edit($id)
    {

    }


    public function destroy($id)
    {

        return view('admin.logstats.index');
    }







}
