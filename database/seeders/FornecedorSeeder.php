<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fornecedor')->insert([
            [
                'nome' => 'Leandro',
                'cnpj' => '12345678000101',
                'email' => 'contato@leandro.com',
                'celular' => '37998605875',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
