<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Curso</title>
</head>
<body>
    <h1>Ver Curso</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="update/{{$curso->id}}" method="POST">
        <!-- @method('PUT') -->
        @csrf

        Nome
        <input type="hidden" name="id" value="{{$curso->id}}">
        <input type="text" name="nome" id="nome" value="{{ $curso->nome }}">
        
        <button>Atualizar</button>
    </form>

    <h2>Disciplinas</h2>
    
    <a href="{{$curso->id}}/inserirDisciplina">(Adicionar Disciplina)</a>
    
    <ul>
        @foreach ($curso->disciplinas as $disciplina)
            <li>{{ $disciplina->nome }} -- {{ $disciplina->pivot->idDisciplina }}
                <a href="{{$curso->id}}/removerDisciplina/{{$disciplina->pivot->idDisciplina}}">(Remover)</a>
            </li>
        @endforeach
    </ul>
</body>
</html>