<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Emprestimo;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        //\App\Emprestimo::class => \App\Policies\MaterialPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        // $this->registerPolicies();

        // Gate::define('emprestimo.desfazer-agendamento', function(User $user, Material $material){

        //      return \Auth::user()->id == $material->id;

        //     });
        
    }
}
