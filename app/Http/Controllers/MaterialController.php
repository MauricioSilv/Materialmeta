<?php

namespace App\Http\Controllers;

use App\Material;
use App\EstadoMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materiais = Material::select(
            'material.*',
            'estadomaterial.estado_atual')
        ->join('estadomaterial', 'estadomaterial.id', '=', 'material.estado_material_id')
        ->get();

        return view('materiais.index', [
            'materiais' => $materiais
        ]);

        $material = Material::select('*');
      
       if($request->has('pesquisa')){
        $material->where('nome', 'like', '%' .$request->get('pesquisa'). '%');
       }
       $material->orderBy('nome', 'asc');

       $materiais = $material->get();

       return view('materiais.index', [

            'materiais'=> $materiais


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

        return view('materiais.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Material;

        $material->nome = $request->get('nome');
        $material->quantidade = $request->get('quantidade');
        $material->marca = $request->get('marca');
        $material->estado_material_id = $request->get('estado_id');
        $material->save();
        
        return redirect()->action('MaterialController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materiais.edita',[

            'material' =>$material

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $material = Material::findOrFail($id);

        $material->nome = $request->input("nome");
        $material->quantidade = $request->input("quantidade");
        $material->marca = $request->input("marca");
        $material->save();

        return redirect()->action('MaterialController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materiais.index');
    }
}
