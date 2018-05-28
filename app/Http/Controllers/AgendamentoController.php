<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

   public function agendprofessor(Request $request)
   {
       $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 
                    ])->get();
        $material = Material::all();
        $emprestimo = Emprestimo::all();

        return view('emprestimo.agendamento-professor', [

          'material' => $material,
          'emprestimo'=> $emprestimo

        ]);

   }

   public function agendar(Request $request)

   {
    $professor_id = $request->get("professor_id");
     if(\Auth::user()->perfil == 'professor')
     {
       $professor_id = \Auth::user()->id;
     }

       $agendar = new Emprestimo;

        $agendar->material_id = $request->get('material_id');
        $agendar->data_emprestimo = date('Y-m-d H:i:s');
        $agendar->user_id = $professor_id;
        $agendar->status_emprestimo = 'reservado';
        $agendar->data_agendamento = $request->get('data_agendamento');
        
        $agendar->save();


   		 $materials = DB::table('material')
        ->where('id', $request->get('material_id'))
        ->update(['status_material' => 2]);

      // $reservado = DB::table('emprestimo')
      // ->where('id', $request->get('material_id'))
      // ->update(['status_emprestimo' => 'Reservado']);
      
      

        return redirect()->action('HomeController@index');
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

      $reservado = DB::table('emprestimo')
      ->where('material_id', $request->get('material_id'))
      ->update(['status_emprestimo' => 'Disponivel']);

      $desfazer = DB::table('material')
      ->where('id', $id)
      ->update(['status_material' => 1]);


   		return redirect()->action('HomeController@index');


   }

   public function listaEmprestimo(Request $request)
   {

      $emprestimo = Emprestimo::select(
        'emprestimo.*',
        'material.nome',
        'material.status_material'
      )
  ->join('material', 'material.id', '=', 'emprestimo.material_id');


  if (Auth::user()->perfil == 'professor')
        {
            $emprestimo->where(function($consulta){
             $consulta->where('emprestimo.user_id', '=', Auth::user()->id);
              $consulta->where('emprestimo.status_emprestimo', '=', 'reservado');
            });
            // $materiais->orWhere('emprestimo.status_emprestimo', '=', 'Livre');
        }
        // dd($emprestimo->toSql());
   $emprestimo = $emprestimo->get();
  return view('emprestimo.listaemprestimo', [
    'emprestimo' => $emprestimo,


  ]);

   }
}
