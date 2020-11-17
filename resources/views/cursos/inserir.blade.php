<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inserir Curso</title>
</head>
<body>
    <h1>Inserir Curso</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/cursos" method="POST">
        @csrf

        Nome
        <input type="text" name="nome" id="nome">
        <button>Salvar</button>
    </form>
</body>
</html>