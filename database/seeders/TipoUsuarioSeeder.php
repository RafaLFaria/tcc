<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_usuario')->insert([
            [
                'descricao' => 'Administrador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descricao' => 'Funcionário',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
