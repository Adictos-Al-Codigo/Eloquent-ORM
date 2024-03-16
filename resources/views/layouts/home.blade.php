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
    <ul>
        <a href="{{route('Principal/Productos')}}"><li>Productos</li></a>
        <a href="{{route('Principal/Categorias')}}"><li>Categorías</li></a>
        <a href="{{route('productos_paginacion')}}"><li>Paginación</li></a>
        <a href="{{route('buscador_interno')}}"><li>Buscador Interno</li></a>
    </ul>
</body>
</html>