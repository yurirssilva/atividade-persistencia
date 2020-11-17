<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('cursos.index', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.inserir');
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
        Curso::create($dados);

        return redirect('cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        Curso::find($curso->id);

        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Curso::find($id)->update($request->all());

        return redirect('cursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::find($id)->delete();

        return redirect('cursos');
    }

    public function listarDisciplinas($id)
    {
        $curso = Curso::find($id);
        $disciplinas = Disciplina::with('cursos')->whereDoesntHave('cursos', function ($query) use ($id) {
            $query->where('curso_disciplina.idCurso', $id);
        })->get();
        return view('cursos.inserirDisciplina', compact('curso'), compact(('disciplinas')));
    }

    public function inserirDisciplina(Request $request)
    {

        $curso = Curso::find($request->id);
        $curso->disciplinas()->attach($request->disciplina);
        return redirect('cursos');

    }


    public function removerDisciplina($id, $idDiscipina)
    {

        $curso = Curso::find($id);
        $curso->disciplinas()->detach($idDiscipina);
        return redirect('cursos');

    }
}
