<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TipoMovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_movimentacao')->insert([
            [
                'descricao' => 'Entrada',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'descricao' => 'Saída',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
