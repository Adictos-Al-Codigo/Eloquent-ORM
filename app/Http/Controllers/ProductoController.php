<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Foto_Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductoController extends Controller
{
    public function HomeVista(){
        return view('layouts.home');
    }

    public function ProductoVista(){
        $lista_productos = DB::table('productos')->join('categorias','productos.idCategorias','=','categorias.id')->select('productos.*', 'categorias.id as CategoriaId','categorias.categoria','categorias.slug')->get();

        return view('layouts.productos', compact('lista_productos'));
    }

    public function CrearProductoVista(){
        return view('layouts.crear_productos');
    }

    public function ProductoSave(Request $resquest){

        $resquest->validate(
        [
            'nombre' => 'required|max:200',
            'slug' => 'required|max:200',
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'idCategorias' => 'required'
        ],
        [
            'nombre.required' => "El Campo Nombre es Obligatorio.",
            'nombre.max' => "El Campo Nombre Tiene Muchos Caracteres",
            'slug.required' => "El Campo Slug es Obligatorio.",
            'slug.max' => "El Campo Slug Tiene Muchos Caracteres",
            'descripcion.required' => "El Campo Descripción es Requerido.",
            'fecha.required' => "El Campo Fecha es Requerido.",
            'fecha.date' => "Ingresa una Valor Fecha.",
            'precio.required' => "El Campo Precio es Requerido.",
            'precio.numeric' => "El Campo Precio es Númerico.",
            'stock.required'=> "El Campo Stock es Requerido.",
            'stock.numeric' => "Ingresa un Valor Númerico en Fecha",
            'idCategorias' => "El Campo Categoria ID es Obligatorio"
        ]
        );


        $Productos = new Productos();
        $Productos->nombre = $resquest->nombre;
        $Productos->slug = $resquest->slug;
        $Productos->descripcion = Str::slug($resquest->descripcion,'-'); 
        $Productos->fecha = $resquest->fecha;
        $Productos->precio = $resquest->precio;
        $Productos->stock = $resquest->stock;
        $Productos->idCategorias = $resquest->idCategorias;
        $Productos->save();
        return redirect()->route('Principal/Productos');
    }

    public function CategoriaVista(){
        $lista_categorias = Categorias::all();
        return view('layouts.categorias',compact('lista_categorias'));
    }

    public function CrearCategoria(){
        return view('layouts.crear_categorias');
    }

    public function CategoriaSave(Request $resq){
        $categoria = new Categorias();
        $categoria->categoria = $resq->categoria;
        $categoria->slug = Str::slug($resq->slug);
        $categoria->save();
        return redirect()->route('Principal/Categorias');
    }

    public function CategoriaEdit($id){
        $categoria = Categorias::find($id);
        return view('layouts.categoriasedit',['categoria' => $categoria]);
    }

    public function CategoriaUpdate(Request $res, $id){

        $categoria = Categorias::find($id);


        if (is_null($categoria)) {
            die("Error");
        }else{
            $categoria = Categorias::find($id);
        }

        $categoria->categoria = $res->categoria;
        $categoria->slug = $res->slug;
        $categoria->save();

        return redirect()->route('Principal/Categorias');
        
    }

    public function CategoriaDelete($id){
        $categoria = Categorias::find($id);
        $categoria->delete();
        return redirect()->route('Principal/Categorias');
    }

    public function ProductosEdit($id){
        $Productos = Productos::where(['id' => $id])->firstOrFail();
        return view('layouts.productosedit', compact('Productos'));
    }

    public function ProductosUpdate(Request $resquest, $id){

        $resquest->validate(
            [
                'nombre' => 'required|max:200',
                'slug' => 'required|max:200',
                'descripcion' => 'required',
                'fecha' => 'required|date',
                'precio' => 'required|numeric',
                'stock' => 'required|numeric',
                'idCategorias' => 'required'
            ],
            [
                'nombre.required' => "El Campo Nombre es Obligatorio.",
                'nombre.max' => "El Campo Nombre Tiene Muchos Caracteres",
                'slug.required' => "El Campo Slug es Obligatorio.",
                'slug.max' => "El Campo Slug Tiene Muchos Caracteres",
                'descripcion.required' => "El Campo Descripción es Requerido.",
                'fecha.required' => "El Campo Fecha es Requerido.",
                'fecha.date' => "Ingresa una Valor Fecha.",
                'precio.required' => "El Campo Precio es Requerido.",
                'precio.numeric' => "El Campo Precio es Númerico.",
                'stock.required'=> "El Campo Stock es Requerido.",
                'stock.numeric' => "Ingresa un Valor Númerico en Fecha",
                'idCategorias' => "El Campo Categoria ID es Obligatorio"
            ]
            );

            $Producto = Productos::where(['id' => $id])->firstOrFail();
            $Producto->nombre = $resquest->nombre;
            $Producto->slug = $resquest->slug;
            $Producto->descripcion = Str::slug($resquest->descripcion,'-'); 
            $Producto->fecha = $resquest->fecha;
            $Producto->precio = $resquest->precio;
            $Producto->stock = $resquest->stock;
            $Producto->idCategorias = $resquest->idCategorias;
            $Producto->save();

            return redirect()->route('Principal/Productos');
    }

    public function DeleteProducto($id){
        $producto = Productos::find($id);
        $producto->delete();
        return redirect()->route('Principal/Productos');
    }

    public function CategoriaProducto($id){


        

        $categoria = Categorias::where(['id' => $id])->firstOrFail();
        $lista_productos_categorias = Productos::where(['idCategorias' => $id])->OrderBy('id','desc')->get();
        return view('layouts.produtos_categorias', compact('lista_productos_categorias', 'categoria'));
    }

    public function VistaFoto($id){
        $producto = Productos::where(['id' => $id])->firstOrFail();
        $foto = Foto_Producto::where(['productos_id' => $id])->get();
        return view('layouts.foto_productos', compact('producto', 'foto'));
    }

    public function FotosGuardar(Request $resq, $id){
        $producto = Productos::where(['id' => $id])->firstOrFail();
        $resq->validate([
            'foto' => 'required|mimes:png,jpg'
        ],
        [
            'foto.required' => "La Foto es Requerida.",
            'foto.mimes' => "Solo Formato Png|Jpg"
        ]
        );

        switch($_FILES['foto']['type']){
            case 'image/png' : 
                $archivo = time().".png";
                break;
            case 'image/jpeg':
                $archivo = time().".jpg";
        }

        copy($_FILES['foto']['tmp_name'], 'uploads'. $archivo);
        Foto_Producto::create(
            [
                'productos_id'=>$id,
                'nombre'=>$archivo
            ]
        );


        return redirect()->route('Fotos', ['id' => $producto->id]);
    }

    public function DeletePhoto($idProducto,$idFoto){
        $foto = Foto_Producto::find($idFoto);
        $foto->delete();
        return redirect()->route('Fotos', ['id' => $idProducto]);
    }

    public function productos_paginacion(){

        $productos = DB::table('productos')->join('categorias', 'productos.idCategorias', '=', 'categorias.id')->select('productos.*', 'categorias.id as CategoriaID', 'categorias.categoria','categorias.slug')->orderBy('id','desc')->paginate(5);
        return view('layouts.bd_paginacion', compact('productos'));
    }

    public function buscador_interno(){
        if (isset($_GET['b'])) {
            $b = $_GET['b'];
            // Productos::where(['nombre' => $b])->get();
            $productos = DB::table('productos')->join('categorias', 'productos.idCategorias', '=', 'categorias.id')->select('productos.*', 'categorias.id as CategoriaID', 'categorias.categoria','categorias.slug')->where('nombre','like','%'.$b.'%')->orderBy('id','desc')->paginate(5);
        }else{
            $productos = DB::table('productos')->join('categorias', 'productos.idCategorias', '=', 'categorias.id')->select('productos.*', 'categorias.id as CategoriaID', 'categorias.categoria','categorias.slug')->orderBy('id','desc')->paginate(5);
        }
        return view('layouts.buscador', compact('productos'));
    }

}
