<?php

namespace App\Http\Controllers;

use App\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    public function index()
    {
    	$tipomaterial = TipoMaterial::all();

    	return view('tipomaterial.index',[
    		'tipomaterial' => $tipomaterial,
    	]);
    }
    public function create()
    {
    	return view('tipomaterial.index');
    }
    public function store(Request $request)
    {

    }
}
