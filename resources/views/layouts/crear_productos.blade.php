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
    <div class="bg-primary p-2 text-white text-center mt-2">Crear un Producto</div>
    @if ($errors->any())
    <div class="alert alert-danger mt-2" style="width: 400px; margin-left: 450px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('ProductosSave')}}" method="POST">
        @csrf
        <div class="form-group text-center" style="width: 500px; margin-left: 400px">
            <input class="form-control form-control-lg mt-2" name="nombre" type="text" placeholder="Nombre del Producto" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg mt-2" name="slug" type="text" placeholder="Slug" aria-label=".form-control-lg example">
            <div class="mb-3">
                <label for="descripcion" class="form-label mt-1">Descripcion</label>
                <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
            </div>
            <label for="fecha_producto" class="mt-1">Fecha del Producto</label>
            <input class="form-control form-control-lg mt-2" id="fecha_producto" name="fecha" type="date" aria-label=".form-control-lg example">
            <label for="precio" class="mt-1">Precio</label>
            <input class="form-control form-control-lg mt-2" name="precio" id="precio" type="number" aria-label=".form-control-lg example">
            <label for="stock" class="mt-1">Stock</label>
            <input class="form-control form-control-lg mt-2" name="stock" id="stock" type="number" aria-label=".form-control-lg example">
            <select name="idCategorias" id="idCategorias" class="form-control">
                @foreach ($Categoria as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                @endforeach
            </select>
            <button  class="btn btn-success mt-2" type="submit">Crear</button>
        </div>
    </form>


    <br><br>
</body>
</html>