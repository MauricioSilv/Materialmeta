<?php

namespace App\Policies;

use App\User;
use App\Emprestimo;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterialPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function listaemprestimo(User $user, Emprestimo $emprestimo)
    {
         //return \Auth::user()->id == $emprestimo->user_id;
    }
}
