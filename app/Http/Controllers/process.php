<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class process extends Controller
{
    public function executeQry(Request $request)
    {
        $qry = $request->qry;
        $exec = str_replace('D1', "'$request->dstart'", $qry);
        $complete = str_replace('D2', "'$request->dended'", $exec);

        $data = DB::select(DB::raw($complete));
        // dd($data);
        return view('report',['data'=>$data]);
    }
}
