<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movimentacao')->insert([
            [
                'quantidade' => 10,
                'data_movimentacao' => Carbon::now()->format('2024-02-26'),
                'id_usuario' => 1,
                'id_produto' => 1,
                'id_tipo_movimentacao' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'quantidade' => 2,
                'data_movimentacao' => Carbon::now()->format('2024-03-13'),
                'id_usuario' => 2,
                'id_produto' => 1,
                'id_tipo_movimentacao' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
