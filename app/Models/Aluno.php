<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'idCurso'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class, 'id', 'idCurso');
    }

    public function disciplinas(){
            return $this->belongsToMany(Disciplina::class, 'aluno_disciplina', 'idAluno', 'idDisciplina')->withPivot('semestre', 'situacao');
    }
}
