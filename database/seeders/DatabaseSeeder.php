<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        
        //$this->call(FornecedorSeeder::class);

        //$this->call(ProdutoSeeder::class);

        //$this->call(CompraSeeder::class);

        //$this->call(TipoUsuarioSeeder::class);


        //$this->call(TipoMovimentacaoSeeder::class);

        //$this->call(MovimentacaoSeeder::class);

    }
}
