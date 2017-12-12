<?php

use Illuminate\Database\Seeder;
use App\TipoMaterial;

class TipoMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $tipo = new TipoMaterial;

        $tipo->nome = 'Permanente';
        $tipo->material_consumo =  false;
        $tipo->material_permanente = true;
        $tipo->save();

        $novotipo = new TipoMaterial;

        $novotipo-> nome = 'Consumo';
        $novotipo->material_consumo = true; 
        $novotipo->material_permanente = false;

        $novotipo->save();
    }
}
