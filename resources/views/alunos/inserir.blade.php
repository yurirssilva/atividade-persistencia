<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir Aluno</title>
</head>

<body>
    <h1>Inserir Aluno</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/alunos" method="POST">
        <!-- @method('PUT') -->
        @csrf
        <label for="curso">Selecione um curso:</label>

        <select name="curso" id="curso">
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
        </select>
        <input type="text" name="nome" id="nome">

        <button>Adicionar</button>
    </form>
</body>

</html>