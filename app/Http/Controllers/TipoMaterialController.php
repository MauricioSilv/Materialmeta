<?php

namespace App\Http\Controllers;

use App\TipoMaterial;
use Illuminate\Http\Request;
use Session;

class TipoMaterialController extends Controller
{
    public function index()
    {
    	$tipomaterial = TipoMaterial::all();

    	return view('tipomaterial.index', array('tipos' => $tipomaterial));
    }
    public function create()
    {
    	return view('tipomaterial.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[

            'tipo_material' => 'required|min:3',

        ]);

        $tipomaterial = new TipoMaterial;

        $tipomaterial->tipo_material = $request->input('tipo_material');

        $tipomaterial->save();

        if($tipomaterial->save())
        {
            return redirect()->action('TipoMaterialController@index');
        }
    }
    public function edit($id)
    {
        $tipomaterial = TipoMaterial::findOrfail($id);

        return view('tipomaterial.edit', array('tipos' => $tipomaterial));
    }
    public function update($id, Request $request)
    {
        $this->validate($request,[

            'tipo_material' => 'required|min:3',

        ]);
        $tipomaterial = TipoMaterial::find($id);

        $tipomaterial->tipo_material = $request->input('tipo_material');

        $tipomaterial->save();

        Session::flash('mensagem' , 'Alteração realizada com sucesso!');
        return redirect()->action('TipoMaterialController@index');
    }
    public function destroy($id)
    {
        $tipomaterial = TipoMaterial::find($id);

        $tipomaterial->delete();

        Session::flash('mensagem', 'Excluído com sucesso!');
        return redirect()->action('TipoMaterialController@index');
    }
}
