<?php

namespace App\Http\Controllers;

use App\TipoM;
use Illuminate\Http\Request;

class Tipo_material extends Controller
{
    public function tipoMate()
    {
    	$tipomaterial = TipoM::all();

    	return view('materiais.tipomate',[
    		'tipomaterial' => $tipomaterial
    	]);
    }
}
