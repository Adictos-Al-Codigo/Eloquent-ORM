<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="bg-primary p-2 text-white text-center mt-2">Editar Categorías</div>
    <form action="{{route('CategoriaUpdate', ['id' => $categoria->id])}}" method="POST">
        @csrf
        <div class="form-group text-center" style="width: 500px; margin-left: 400px">
            <label for="categoria">Categoria</label>
            <input class="form-control form-control-lg mt-2" id="categoria" value="{{$categoria->categoria}}" name="categoria" type="text" placeholder="Nombre de la Categoria" aria-label=".form-control-lg example">
            <label for="slug">Slug</label>
            <input class="form-control" id="slug" value="{{$categoria->slug}}"  form-control-lg mt-2"  name="slug" type="text" placeholder="Slug" aria-label=".form-control-lg example">
            <button  class="btn btn-success mt-2" type="submit">Actualizar</button>
        </div>
    </form>

    <br>
</body>
</html>