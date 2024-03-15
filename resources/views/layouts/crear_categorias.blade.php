<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="bg-primary p-2 text-white text-center mt-2">Crear una Categoria</div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger mt-2" style="width: 400px; margin-left: 450px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <form action="{{route('CategoriasSave')}}" method="POST" class="mt-4">
        @csrf
        <div class="form-group text-center" style="width: 500px; margin-left: 400px">
            <input class="form-control form-control-lg mt-2" name="categoria" type="text" placeholder="Nombre de la Categoría" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg mt-2" name="slug" type="text" placeholder="Slug" aria-label=".form-control-lg example">
            <button  class="btn btn-success mt-5" type="submit">Crear Categoría</button>
        </div>
    </form>


    <br><br>
</body>
</html>