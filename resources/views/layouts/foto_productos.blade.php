<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foto del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="bg-success p-2 text-white text-center">Foto del Producto: {{$producto->nombre}} ({{$foto->count()}})</div>
    
    <form style="width: 350px; margin-left: 470px" action="{{route('SavePhoto', ['id' => $producto->id])}}" class="form-group mt-2 text-center" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="foto" id="foto" class="form-control">
        <button class="btn btn-primary mt-2">Enviar</button>
    </form>
    
    <table class="table" style="width: 800px; margin-left: 350px">
        <thead>
          <tr>
            <th scope="col">Nro.</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($foto as $foto)
          <tr>
            <th scope="row">{{$foto->id}}</th>
            <td>
              <img src="{{asset('uploads/')}}{{$foto->nombre}}" width="180px" height="180px">
            </td>
            <td>
                <a href="{{route('DeletePhoto', ['producto_id' => $producto->id, 'foto_id' => $foto->id])}}"><i class="bi bi-trash3"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>