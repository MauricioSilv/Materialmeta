<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emprestimo;
use App\Professor;
use App\Material;
use App\User;
use Session;

class AgendamentoController extends Controller
{
    public function listar($id)
    {
    	$professor = Professor::all();
    	$material = Material::find($id);
    	$emprestimo = Emprestimo::all();

    	return view('emprestimo.confirmar-agendamento',[

    		'professor' => $professor,
    		'material' => $material,
    		'material_id' =>$id,

    ]);
   }

   public function agendar(Request $request)

   {
   		 $materials = DB::table('material')
        ->where('id', $request->get('material_id'))
        ->update(['status_emprestimo' => 2]);

        return redirect()->action('MaterialController@index');
   }

   public function desfazer($id)
   {	
   		$professor = Professor::all();
   		$materiais = Material::find($id);
   		$emprestimo = Emprestimo::all();


   		return view('emprestimo.desfazer-agendamento', [

   			'professor' =>$professor,
   			'material' => $materiais,
   			'material_id' =>$id,
        'emprestimo' =>$emprestimo,


   		]);

   }

   public function updateDesfazer($id, Request $request)
   {
   		$desfazer = DB::table('material')
   		->where('id', $request->get('material_id'))
   		->update(['status_emprestimo' => 1]);

   		return redirect()->action('MaterialController@index');


   }
}
