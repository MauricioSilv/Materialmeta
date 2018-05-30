<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emprestimo;
use App\Material;
use App\User;

class InicioController extends Controller
{
    protected function inicio()
    {

    	$emprestimos = Emprestimo::all();
    	$materiais = Material::all();
    	$users = DB::table('users')
                   ->where([
                    ['perfil', '=', 'professor'], 
                    ])->get();
        $agendamentouser = Emprestimo::select(
            'emprestimo.*'
            );
        $reservado = Emprestimo::select(
            'emprestimo.*'
        );
        if(\Auth::user()->perfil =='professor')
        {
            $reservado->where('emprestimo.status_emprestimo', '=', 'reservado');
            $agendamentouser->where('emprestimo.user_id', '=', \Auth::user()->id);
        }
        $agendamentouser = $agendamentouser->get();
        $reservado = $reservado->get();
        return view('index', [

        	'emprestimos' => $emprestimos,
        	'materiais' => $materiais,
        	'users' => $users,
            'agendamentouser' => $agendamentouser,
            'reservado' =>$reservado,




        ]);




    }
}
