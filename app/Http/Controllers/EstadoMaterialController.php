<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoMaterial;

class EstadoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = EstadoMaterial::all();

         return view('EstadoMaterial.index',[

            'estados' => $estados,


         ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $estados = EstadoMaterial::all();
        return view('EstadoMaterial.create', [

            'estados' =>$estados


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'estado_atual' => 'required|min:3',


        ]);

        $estados = new EstadoMaterial;

        $estados->estado_atual = $request->get("estado_atual");

        $estados->save();

        return redirect()->action('EstadoMaterialController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoMaterialController  $estadoMaterialController
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoMaterialController $estadoMaterialController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoMaterialController  $estadoMaterialController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados = EstadoMaterial::findOrFail($id);

        return view('EstadoMaterial.edita', [

            'estados' => $estados


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoMaterialController  $estadoMaterialController
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [

            'estado_atual' => 'required|min:3',


        ]);
        
        $estados = EstadoMaterial::findOrFail($id);

        $estados->estado_atual = $request->input("estado_atual");

        $estados->save();

        return redirect()->action('EstadoMaterialController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoMaterialController  $estadoMaterialController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estados = EstadoMaterial::findOrFail($id);
        $estados->delete();

        return redirect()->action('EstadoMaterialController@index');  
 }
}
