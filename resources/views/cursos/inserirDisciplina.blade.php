<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir Disciplina</title>
</head>

<body>
    <h1>Inserir Disciplina</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="inserirDisciplina" method="POST">
        <!-- @method('PUT') -->
        @csrf
        <h1>Curso: {{$curso->nome}}</h1>

        <input type="hidden" name="id" value="{{$curso->id}}">
        <label for="disciplina">Selecione uma disciplina:</label>

        <select name="disciplina" id="disciplina">
            @foreach ($disciplinas as $disciplina)
            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
            @endforeach
        </select>
        <button>Adicionar</button>
    </form>
</body>

</html>