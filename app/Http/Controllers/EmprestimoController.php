<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Emprestimo;
use Illuminate\Http\Request;
use App\Professor;
use App\Material;
use App\User;
class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        

        $emprestimo = new Emprestimo;

        $emprestimo->professor_id = $request->get('professor_id');
        $emprestimo->material_id = $request->get('material_id');
        $emprestimo->data_emprestimo = date('Y-m-d H:i:s');
        $emprestimo->user_id = \Auth::id();
        
        $emprestimo->save();

        return redirect()->action('MaterialController@index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $professores = Professor::all();
        $material = Material::find($id);
        $emprestimo = Emprestimo::all();
        if($emprestimo == true)
        {
        $materials = DB::table('material')
        ->where('id', $id)
        ->update(['status_emprestimo' => 3]);    
        }

        
        return view('emprestimo.confirmar-emprestimo', [
            'professores' => $professores,
            'material' => $material,
            'material_id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $professores = Professor::all();
        $material = Material::find($id);
        $emprestimo = Emprestimo::all();

        
        return view('emprestimo.confirmar-devolucao', [
            'professores' => $professores,
            'material' => $material,
            'material_id' => $id,
        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $emprestimo = Emprestimo::find($id);

        $emprestimo->data_emprestimo = date('Y-m-d H:i:s');
        $emprestimo->devolucao = date('Y-m-d H:i:s');
        if($emprestimo->save())
    {
        $materiais = DB::table('material')
        ->where('id', $id)
        ->update(['status_emprestimo' => 1]);
    }

        return redirect()->action('MaterialController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
