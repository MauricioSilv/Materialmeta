<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();

        return view('professors.index',[

            'professors' =>$professors


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
        $this->validate($request, [

            'nome' => 'required|min:3',
            'contato' => 'required|numeric',
            'sexo' => 'required|boolean',
            'email' => 'required|email|',
            'endereco' => 'required|string|min:3',
            'senha' => 'required|min:3|',
        ]);
        $professor = new Professor();

        $professor->nome = $request->input("nome");

         $professor->contato = $request->input("contato");

         $professor->sexo = $request->input("sexo");

         $professor->email = $request->input("email");                               
         $professor->endereco = $request->input("endereco");                               
         $professor->senha = bcrypt($request->input("senha"));

         $professor->save();

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
        $professor = Professor::findOrFail($id);

        return view('professors.edita', compact('professor'));
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
         $this->validate($request, [

            'nome' => 'required|min:3',
            'contato' => 'required|numeric',
            'sexo' => 'required|boolean',
            'email' => 'required|email|',
            'endereco' => 'required|string|min:3',
            'senha' => 'required|min:3|',
        ]);
         
        $professor = Professor::findOrFail($id);

        $professor->nome = $request->input("nome");
        $professor->contato = $request->input("contato");
        $professor->sexo = $request->input("sexo");
        $professor->email = $request->input("email");
        $professor->endereco = $request->input("endereco");
        $professor->senha = bcrypt($request->input("senha"));
       
        $professor->save();

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
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professors.index');
    }
}
