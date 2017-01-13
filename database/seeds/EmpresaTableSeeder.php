<?php

use Illuminate\Database\Seeder;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'razao' => 'Restaurante Teste Ltda.',
            'fantasia' => 'Restaurante Teste',
            'cnpj' => '6546579876984',
            'responsavel' => 'Fulano Alvarez',
            'telefone_delivery' => '(61) 98745-5654',
            'descricao' => 'Esse é um restaurante de teste',
            'telefone_delivery2' => '(61) 98745-5444',
            'taxa_entrega' => '4',
            'tempo_medio' => '40',
            'pedido_medio' => '30',
            'slug' => 'restaurante-teste',
        ]);
    }
}
