<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Alunos</h1>

    <ul>
        @foreach ($alunos as $aluno)
            <li>{{ $aluno->nome }}
                <a href="/alunos/{{ $aluno->id }}">(Atualizar)</a>
                |
                <a href="/alunos/delete/{{ $aluno->id }}">(Excluir)</a>
            </li>
        @endforeach
    </ul>

    <p><a href="/alunos/create">Inserir Aluno</a></p>
</body>
</html>