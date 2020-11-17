<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas = Disciplina::all();

        return view('disciplinas.index', ['disciplinas' => $disciplinas]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.inserir'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        Disciplina::create($dados);

        return redirect('disciplinas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        Disciplina::find($disciplina->id);

        return view('disciplinas.show', compact('disciplina'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Disciplina::find($id)->update($request->all());

        return redirect('disciplinas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disciplina::find($id)->delete();

        return redirect('disciplinas');
    }
}
