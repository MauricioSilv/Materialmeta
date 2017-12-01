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
         $professor = Professor::create([

        	'nome'=>'Mauricio da silva',
        	'contato'=>'99999999',
        	'email'=>'mausilva828@gmai.com',
        	'endereco'=>'seilaondefica',
        	'senha'=>bcrypt('123'),


        ]);
    }
}
