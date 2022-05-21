<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membros = DB::table('membros')
                    ->orderBy('nome','asc')
                    ->get();
        return view('membro.index',compact('membros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membro.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into membros (nome,sexo,ativo) values (?, ?, ?)',
                    [$request->nome,$request->sexo,$request->ativo]);

        return route('membro.create');

    }

    /**
     * Display the specified resource.
     *
     * @param number $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membro = DB::table('membros')->where('id',$id)->first();
        return view('membro.create-update',compact($membro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param number $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membro = DB::table('membros')->where('id',$id)->first();
        return view('membro.create-update',compact($membro));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::update('update membros set nome = ? and sexo = ? and ativo = ? where id = ?',
                    [$request->nome,$request->sexo,$request->ativo,$id]);

        return route('membro.edit',compact($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete membros where id = ?', [$id]);
        return route('membro.index');
    }

    public function alteraStatus($id){
        $membro = DB::table('membros')->where('id',$id)->first();
        if($membro->ativo == 1){
            DB::update('update membros set ativo = 0 where id = ?', [$id]);
        }else{
            DB::update('update membros set ativo = 1 where id = ?', [$id]);
        }

        return response()->json(true);
    }
    public function alterastatusMembro($id){
        $ativo = DB::table('membros')->where('id',$id)->first()->ativo;
        $novoStatus = $ativo == 1 ? 0 : 1;

        $consulta = DB::update('update membros set ativo = ? where id = ?', [$novoStatus,$id]);

        if($consulta){
            return response()->json($novoStatus);
        }
        return response()->json(false);
    }
}
