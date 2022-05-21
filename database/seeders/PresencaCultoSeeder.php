<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresencaCultoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membros = DB::table('membros')->get();
        $cultos = DB::table('cultos')->get();
        foreach($membros as $membro){
            foreach($cultos as $culto){
                DB::table('presenca_cultos')->insert([
                    'membro_id' => $membro->id,
                    'culto_id' => $culto->id,
                    'compareceu' => true,
                    'ativo' => true
                ]);
            }
        }
    }
}
