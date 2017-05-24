<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use DB;

class siteController extends Controller
{
    public function getCidades($idEstado){
        $cidades = DB::select('select * from cidades where estado_id='.$idEstado);        
        return Response::json($cidades);
    }
}
