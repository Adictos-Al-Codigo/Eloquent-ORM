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
    <div class="bg-primary p-2 text-white text-center mt-2">Editar Producto</div>
    <form action="{{route('ProductosUpdate', ['id' => $Productos->id])}}" method="POST">
        @csrf
        <div class="form-group text-center" style="width: 500px; margin-left: 400px">
            <input class="form-control form-control-lg mt-2" value="{{$Productos->nombre}}" name="nombre" type="text" placeholder="Nombre del Producto" aria-label=".form-control-lg example">
            <input class="form-control" value="{{$Productos->slug}}"  form-control-lg mt-2"  name="slug" type="text" placeholder="Slug" aria-label=".form-control-lg example">
            <div class="mb-3">
                <label for="descripcion" class="form-label mt-1">Descripcion</label>
                <textarea  name="descripcion" class="form-control" id="descripcion" rows="3">{{$Productos->descripcion}}</textarea>
            </div>
            <label for="fecha_producto" class="mt-1">Fecha del Producto</label>
            <input class="form-control form-control-lg mt-2" value="{{$Productos->fecha}}" id="fecha_producto" name="fecha" type="date" aria-label=".form-control-lg example">
            <label for="precio" class="mt-1">Precio</label>
            <input class="form-control form-control-lg mt-2" value="{{$Productos->precio}}" name="precio" id="precio" type="number" aria-label=".form-control-lg example">
            <label for="stock" class="mt-1">Stock</label>
            <input class="form-control form-control-lg mt-2" value="{{$Productos->stock}}" name="stock" id="stock" type="number" aria-label=".form-control-lg example">
            <label for="categoria_id" class="mt-1">Categoria ID</label>
            <input class="form-control form-control-lg mt-2" value="{{$Productos->idCategorias}}" name="idCategorias" id="categoria_id" type="text" aria-label=".form-control-lg example">
            <button  class="btn btn-success mt-2" type="submit">Actualizar</button>
        </div>
    </form>

    <br>
</body>
</html>