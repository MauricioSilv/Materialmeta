<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emprestimo;
use App\Material;
use App\User;
use Session;

class AgendamentoController extends Controller
{
    public function listar($id)
    {
    	 $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 
                    ])->get();
    	$material = Material::find($id);
    	$emprestimo = Emprestimo::all();

    	return view('emprestimo.confirmar-agendamento',[

    		'professores' => $users,
    		'material' => $material,
    		'material_id' =>$id,

    ]);
   }

   public function agendar(Request $request)

   {
   		 $materials = DB::table('material')
        ->where('id', $request->get('material_id'))
        ->update(['status_material' => 2]);

      $reservado = DB::table('emprestimo')
      ->where('id', $request->get('material_id'))
      ->update(['status_emprestimo' => 'Reservado']);
      
      

        return redirect()->action('MaterialController@index');
   }

   public function desfazer($id)
   {	
   		      $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 
                    ])->get();
   		$materiais = Material::find($id);
   		$emprestimo = Emprestimo::all();


   		return view('emprestimo.desfazer-agendamento', [

   			'professores' =>$users,
   			'material' => $materiais,
   			'material_id' =>$id,
        'emprestimo' =>$emprestimo,


   		]);

   }

   public function updateDesfazer($id, Request $request)
   {
   		$desfazer = DB::table('material')
   		->where('id', $request->get('material_id'))
   		->update(['status_material' => 1]);

      $reservado = DB::table('emprestimo')
      ->where('id', $request->get('material_id'))
      ->update(['status_emprestimo' => 'Livre']);

   		return redirect()->action('MaterialController@index');


   }
}
