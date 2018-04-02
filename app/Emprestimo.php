<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimo';
    protected $fillable = [
    	'id','user_id','material_id','professor_id','devolucao','data_emprestimo',

    ];

    
}
