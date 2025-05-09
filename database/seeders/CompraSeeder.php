<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compra')->insert([
            [
                'id_fornecedor' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
