<?php

use Illuminate\Database\Seeder;
use App\EstadoMaterial;

class EstadoMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = new EstadoMaterial();

        $estado->estado_atual = 'Bom';

        $estado->save();

       }
}
