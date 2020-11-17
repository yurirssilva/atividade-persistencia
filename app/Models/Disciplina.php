<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;
        protected $table = 'disciplina';

        protected $primaryKey = 'id';

        public $timestamps = false;

        protected $fillable = [
            'nome'
        ];

        public function cursos(){
            return $this->belongsToMany(Curso::class, 'curso_disciplina', 'idDisciplina', 'idCurso');
        }

        public function alunos(){
            return $this->belongsToMany(Aluno::class, 'aluno_disciplina', 'idDisciplina', 'idAluno')->withPivot('semestre', 'situacao');
        }
}
