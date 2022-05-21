<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CultoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Terça
        DB::table('cultos')->insert([
            'data' => '2022-03-08',
            'dia' => 'terça',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-15',
            'dia' => 'terça',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-22',
            'dia' => 'terça',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-29',
            'dia' => 'terça',
            'ativo' => true
        ]);
          // Sabado
          DB::table('cultos')->insert([
            'data' => '2022-03-12',
            'dia' => 'sabado',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-19',
            'dia' => 'sabado',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-26',
            'dia' => 'sabado',
            'ativo' => true
        ]);
        // Domingo
        DB::table('cultos')->insert([
            'data' => '2022-03-06',
            'dia' => 'domingo',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-13',
            'dia' => 'domingo',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-20',
            'dia' => 'domingo',
            'ativo' => true
        ]);
        DB::table('cultos')->insert([
            'data' => '2022-03-27',
            'dia' => 'domingo',
            'ativo' => true
        ]);
    }
}
