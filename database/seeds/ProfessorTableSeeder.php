<?php

use Illuminate\Database\Seeder;
use App\Professor;

class ProfessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $professor = new Professor;
 
        $professor->nome = 'Mauricio';
        $professor->contato = '991638786';
        $professor->sexo = 'Masculino';
        $professor->endereco = 'seilaondefica';
        $professor->email = 'mausilva828@gmai.com';
        $professor->senha = bcrypt('123');
        $professor->save();

    
    }
}
