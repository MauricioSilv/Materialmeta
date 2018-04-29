<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Professor;

class UseProfessorController extends Controller
{
    public function index()
    {
    	return "Exibir os controlers do professor.";
    }

    public function login()

    {
    	return "Formulario de login";
    }

    public function formLogin()
    {
    	return "login.";
    }
}
