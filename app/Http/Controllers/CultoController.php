<?php

namespace App\Http\Controllers;

use App\Models\Culto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CultoController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultos = DB::table('cultos')
                    ->orderBy('data','asc')
                    ->orderBy('ativo','desc')
                    ->get();

        $presentes = DB::table('presenca_cultos')
                        ->select(DB::raw('count(compareceu) as quantidade'),'culto_id')
                        ->where('compareceu',true)
                        ->groupBy('culto_id')
                        ->get();
        $ausentes = DB::table('presenca_cultos')
                        ->select(DB::raw('count(compareceu) as quantidade'),'culto_id')
                        ->where('compareceu',false)
                        ->groupBy('culto_id')
                        ->get();

        foreach($cultos as $culto){
            foreach($presentes as $presente){
                if($presente->culto_id == $culto->id){
                    if( $presente->quantidade == null){
                        $culto->presentes = 0;
                    }else{
                        $culto->presentes = $presente->quantidade;
                    }
                }
            }
            $c = 0;
            foreach($ausentes as $ausente){

                if($ausente->culto_id == $culto->id){
                    $c = $ausente->quantidade;
                }

            }
            if($c > 0){
                $culto->ausentes = $c;
            }else{
                $culto->ausentes = 0;
            }
            $c = 0;
        }
        return view('culto.index',compact('cultos','presentes','ausentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('culto.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('insert into cultos (data,dia,ativo) values (?, ?, ?)',
                    [$request->data,$request->dia,$request->ativo]);

        return route('culto.create');

    }

    /**
     * Display the specified resource.
     *
     * @param number $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $culto = DB::table('cultos')->where('id',$id)->first();
        return view('culto.create-update',compact($culto));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param number $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $culto = DB::table('cultos')->where('id',$id)->first();
        return view('culto.create-update',compact($culto));
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
        DB::update('update cultos set data = ? and dia = ? and ativo = ? where id = ?',
                    [$request->data,$request->dia,$request->ativo,$id]);

        return route('culto.edit',compact($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  number $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete cultos where id = ?', [$id]);
        return route('culto.index');
    }

    public function listacomparecimento($data,$dia){
        $listaComparecimento = DB::table('presenca_cultos AS pc')
                                ->join('membros AS m','m.id','pc.membro_id')
                                ->join('cultos AS c','c.id','pc.culto_id')
                                ->select('pc.id','m.nome','c.data','c.dia','pc.compareceu','pc.ativo')
                                ->where('c.data',$data)
                                ->orderBy('m.nome','asc')
                                // ->orderBy('compareceu','desc')
                                ->get();

        return view('culto.lista-comparecimento',compact('listaComparecimento','data','dia'));
    }
    public function alterastatusListacomparecimento($id){
        $compareceu = DB::table('presenca_cultos')->where('id',$id)->first()->compareceu;
        $novoStatus = $compareceu == 1 ? 0 : 1;

        $consulta = DB::update('update presenca_cultos set compareceu = ? where id = ?', [$novoStatus,$id]);

        if($consulta){
            return response()->json($novoStatus);
        }
        return response()->json(false);
    }
    public function alterastatusCulto($id){
        $ativo = DB::table('cultos')->where('id',$id)->first()->ativo;
        $novoStatus = $ativo == 1 ? 0 : 1;

        $consulta = DB::update('update cultos set ativo = ? where id = ?', [$novoStatus,$id]);

        if($consulta){
            return response()->json($novoStatus);
        }
        return response()->json(false);
    }
}
