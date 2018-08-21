<?php

namespace App\Http\Controllers;

use App\Material;
use App\EstadoMaterial;
use App\TipoMaterial;
use App\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class MaterialController extends Controller
{
    private $estados;
    private $tipos;

    public function construct__(EstadoMaterial $estados,TipoMaterial $tipos)
    {
        $this->tipos = $tipos;
        $this->estados = $estados;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $emprestimo = Emprestimo::all(); // Return Collection

        $materiais = Material::select(
            'material.*',
            'estadomaterial.estado_atual',
            'tipomaterial.tipo_material as tipo'
        )
        ->join('estadomaterial', 'estadomaterial.id', '=', 'material.estado_material_id')
        ->join('tipomaterial', 'tipomaterial.id', '=', 'material.tipo_material_id')
        ->with(['emprestimos']); // return Builder;

       if($request->has('pesquisa')){
         $materiais->where('material.nome', 'like', '%' .$request->get('pesquisa'). '%');
        }

       $materiais = $materiais->get(); //return collection

       return view('materiais.index', [

            'materiais'=> $materiais,
            'pesquisa' => $request->get('pesquisa'),
            'emprestimo' => $emprestimo, 


       ]);  



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tipos,$estados)
    {
        $estados->all();
        $tipos->all();

        return view('materiais.create',array('estados' => $estados, 'tipo' =>$tipos));
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

            'nome' => 'required|unique:material|min:3',
            'marca' => 'required|string|min:1',
        ]);//validação dos campos;

        $material = new Material;

        $material->nome = $request->get('nome');
        $material->marca = $request->get('marca');
        $material->status_material = 1;
        $material->estado_material_id = $request->get('estado_id');
        $material->tipo_material_id = $request->get('tipo_id');
        $material->save();

         Session::flash('mensagem' , 'Criado com sucesso!');
        
        return redirect()->action('MaterialController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


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
        $estados = EstadoMaterial::all();
        return view('materiais.edita')->with(compact('material', 'estados'));
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


         $this->validate($request, [

            'nome' => 'required|min:3',
            'marca' => 'required|string|min:1',
        ]);
        $material = Material::findOrFail($id);

        $material->nome = $request->input("nome");
        $material->marca = $request->input("marca");
        $material->estado_material_id = $request->input("estado_id");
        $material->save();

         Session::flash('mensagem' , 'Alteração realizada com sucesso!');

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

         Session::flash('mensagem' , 'Excluído com sucesso!');

        return redirect()->route('materiais.index');
    }
  
}
