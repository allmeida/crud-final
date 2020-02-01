<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view('contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            Contato::create($request->all());
            flash('Contato salvo com sucesso')->success();
    
            }catch(\Exception $erro){
    
            flash('Erro ao salvar Contato')->error();
    
            return redirect()->back();
    
        }
            return redirect ('/contatos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $contato = Contato::find($id);
        return view('contato.create', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        try {
            $contato->update($request->all());
            flash('Atualizado com sucesso')->success();
        }catch (\Exception $e) {
            flash('Ocorreu um erro ao atualizar')->error();
            return back()->withInput();
        }

        return redirect()->route('contatos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        flash('Contato excluido com sucesso')->success();
    }

    public function relatorio() {
        $contatos = Contato::all();
        return \PDF::loadView('contato.pdf', compact('contatos'))->stream();
        //return view('contato.pdf');
        //return \PDF::loadView('contato.pdf')->download('relatório_contatos.pdf');
    }
}
