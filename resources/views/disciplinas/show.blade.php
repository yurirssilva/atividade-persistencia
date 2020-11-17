<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Disciplina</title>
</head>
<body>
    <h1>Atualizar Disciplina</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="update/{{$disciplina->id}}" method="POST">
        <!-- @method('PUT') -->
        @csrf

        Nome
        <input type="hidden" name="id" value="{{$disciplina->id}}">
        <input type="text" name="nome" id="nome" value="{{ $disciplina->nome }}">
        
        <button>Salvar</button>
    </form>
</body>
</html>