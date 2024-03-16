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
    <div class="bg-success p-2 text-white text-center">Productos</div>

    <a href="{{route('Productos-Crear')}}"><button style="position: relative; left: 15px;" type="button"  class="btn btn-primary mt-3">Crear Producto</button></a>

    <!-- Search -->
    <div class="col-6">
        <form action="{{route('buscador_interno')}}" method="GET">
            <div class="input-group mb-3" style="margin-left: 10px">
                <input type="search" class="form-control mt-4" placeholder="Buscar" name="b" id="b" value="">
                <button style="height: 40px" class="btn btn-primary mt-4" type="button" id="enviar" onclick="buscador();"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
    <!-- Search End -->


    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
            <th scope="col">Nombre</th>
            <th scope="col">Slug</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
        
            @foreach ($productos as $producto)
                <tr>
                    <th scope="row">{{$producto->id}}</th>
                    <td><a href="{{route('ProductosCategorias', ['id' => $producto->CategoriaID])}}">{{$producto->categoria}}</a></td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->slug}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->fecha}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->stock}}</td>
                    <td><a href="{{route('Fotos', ['id' => $producto->id])}}"><i class="bi bi-camera2"></i></a></td>
                    <td>
                        <a href="{{route('ProductosEdit',['id'=>$producto->id])}}"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('ProductosDelete',['id' => $producto->id])}}"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      <div style="margin-left: 15px">
        {{$productos->links()}}
      </div>

      <script>
        function buscador(){
        if (document.getElementById('b').value == 0) {
        return false;
        }
        window.location = "/bd/buscador?b=" + document.getElementById('b').value;
        }
      </script>
      
</body>
</html>