<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Emprestimo;
use Illuminate\Http\Request;
use App\Material;
use App\User;
use Session;
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

        $emprestimo->material_id = $request->get('material_id');
        $emprestimo->data_emprestimo = date('Y-m-d H:i:s');
        $emprestimo->user_id = $request->get("professor_id");
        $emprestimo->status_emprestimo = 'Ativo';
        $emprestimo->data_agendamento = date('Y-m-d H:i:s');
        
        $emprestimo->save();

        $materials = DB::table('material')
        ->where('id', $request->get('material_id'))
        ->update(['status_material' => 3]);

         Session::flash('mensagem' , 'Emprestimo realizado com sucesso!');

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
        // dd($id);
         $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 
                    ])->get(); // retorna uma collection;

        $material = Material::find($id);
        $emprestimo = Emprestimo::all();

        // if($emprestimo !== null)
        // {
        // $materials = DB::table('material')
        // ->where('id', $id)
        // ->update(['status_emprestimo' => 3]);    
        // }
        
        return view('emprestimo.confirmar-emprestimo', [
            'users' => $users,
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
        
          $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 
                    ])->get();

         $material = Material::find($id);
        $emprestimo = Emprestimo::find($id);

        
        return view('emprestimo.confirmar-devolucao', [
            'users' => $users,
            'material' => $material,
            'material_id' => $id,
            'emprestimo' => $emprestimo,
            'emprestimo_id' =>$id
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
    
        
        $materiais = DB::table('material')
        ->where('id', $id)
        ->update(['status_material' => 1]);

        $devolucao = DB::table('emprestimo')
        ->where('material_id', $request->get('material_id'))
        ->update(['status_emprestimo'=> 'finalizado']);

        $emp = DB::table('emprestimo')
        ->whereNull('devolucao')
        ->where('material_id', $request->get('material_id'))
        ->update(['devolucao' => date('Y-m-d H:i:s')]);

         Session::flash('mensagem' , 'Devolução realizada com sucesso!');

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
