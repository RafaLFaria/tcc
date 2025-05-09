<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produto')->insert([
            [
                'nome' => 'Fermento',
                'descricao' => 'Descrição do Fermento',
                'imagem' => 'fermento.jpg',
                'preco' => 29.99,
                'total_estoque' => 10,
                'cod_barras' => '1234567890123',
                'id_fornecedor' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
