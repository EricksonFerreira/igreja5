<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Homens
        DB::table('membros')->insert([
            'nome' => 'Erickson',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Ezequiel',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Erinston',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Denilson',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Elvis',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Eduardo',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Joel',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Jonatas',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Lucas',
            'sexo' => 'M',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Wesley',
            'sexo' => 'M',
            'ativo' => true
        ]);
        // Mulheres
        DB::table('membros')->insert([
            'nome' => 'Wilka',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Fernanda',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Livia',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Thaynara',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Taynan',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Nadja',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Débora',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Geri',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Rhaiza',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Carol',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Cláudia',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Elayne',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Eliã',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Ellen',
            'sexo' => 'F',
            'ativo' => true
        ]);
        DB::table('membros')->insert([
            'nome' => 'Jumaraisa',
            'sexo' => 'F',
            'ativo' => true
        ]);
    }
}
