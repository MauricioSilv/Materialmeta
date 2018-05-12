<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = DB::table('users')
                   ->where([

                    ['perfil', '=', 'professor'], 


                    ])->get();

        return view('professors.index',[

            'users' =>$users


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [

        //     'nome' => 'required|min:3',
        //     'contato' => 'required|numeric',
        //     'sexo' => 'required|',
        //     'email' => 'required|email|',
        //     'endereco' => 'required|string|min:3',
        //     'password' => 'required|min:3|',
        // ]);
        $user = new User();

        $user->name = $request->input("name");
        $user->perfil = 'professor';
        $user->email = $request->input("email");                                                              
        $user->password = bcrypt($request->input("password"));

         $user->save();

          Session::flash('mensagem' , 'Criado com sucesso!');

         return redirect()->route('professors.index');                               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$professor = Professor::findOrFail($id);

        //return view('professors.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('professors.edita', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //  $this->validate($request, [

        //     'nome' => 'required|min:3',
        //     'contato' => 'required|numeric',
        //     'sexo' => 'required',
        //     'email' => 'required|email|',
        //     'endereco' => 'required|string|min:3',
        // ]);
         
        $professor = User::findOrFail($id);

        $professor->name = $request->input("name");
        $professor->email = $request->input("email");
        $professor->password = bcrypt($request->input("password"));
       
        $professor->save();

         Session::flash('mensagem' , 'Alteração realizada com sucesso!');

        return redirect()->route('professors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professor = User::findOrFail($id);
        $professor->delete();

         Session::flash('mensagem' , 'Excluído com sucesso!');

        return redirect()->route('professors.index');
    }
}
