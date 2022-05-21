<?php

namespace App\Http\Controllers;

use App\Models\PresencaCulto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresencaCultoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presencaCultos = DB::table('presenca_cultos AS pc')
                            ->join('membros AS m','m.id','pc.membro_id')
                            ->join('cultos AS c','c.id','pc.culto_id')
                            ->select('pc.id','m.nome','c.data','c.dia','pc.compareceu','pc.ativo')
                            ->where('pc.ativo',true)
                            ->orderBy('data','asc')
                            ->orderBy('compareceu','desc')
                            ->get();
        return view('presencaCulto.index',compact('presencaCultos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PresencaCulto  $presencaCulto
     * @return \Illuminate\Http\Response
     */
    public function show(PresencaCulto $presencaCulto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PresencaCulto  $presencaCulto
     * @return \Illuminate\Http\Response
     */
    public function edit(PresencaCulto $presencaCulto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PresencaCulto  $presencaCulto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PresencaCulto $presencaCulto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PresencaCulto  $presencaCulto
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresencaCulto $presencaCulto)
    {
        //
    }
}
