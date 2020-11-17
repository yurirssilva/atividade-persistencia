<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
</head>
<body>
    <h1>Cursos</h1>

    <ul>
        @foreach ($cursos as $curso)
            <li>{{ $curso->nome }}
                <a href="/cursos/{{ $curso->id }}">(Atualizar)</a>
                |
                <a href="/cursos/delete/{{ $curso->id }}">(Excluir)</a>
            </li>
        @endforeach
    </ul>

    <p><a href="/cursos/create">Inserir Curso</a></p>
</body>
</html>