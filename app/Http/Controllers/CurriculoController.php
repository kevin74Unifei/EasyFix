<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CurriculoController extends Controller
{
   public function create(){
        $states = DB::select('select * from estados');
        
        return View("crud-curriculo/curriculoForm",compact("states"));
   }
}
