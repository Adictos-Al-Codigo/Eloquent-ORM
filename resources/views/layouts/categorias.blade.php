<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="bg-success p-2 text-white text-center">Categorías</div>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Slug</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        
            @foreach ($lista_categorias as $categoria)
                <tr>
                    <th scope="row">{{$categoria->id}}</th>
                    <td>{{$categoria->categoria}}</td>
                    <td>{{$categoria->slug}}</td>
                    <td>
                        <a href="{{route('Categorias-Edit',['id' => $categoria->id])}}"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('CategoriaEliminar', ['id' => $categoria->id])}}"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <a href="{{route('crear-categorias')}}"><button style="position: relative; left: 15px;" type="button"  class="btn btn-primary">Crear Categoría</button></a>
</body>
</html>