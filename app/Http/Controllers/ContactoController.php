<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contacto;// importamos el modelo

use App\Http\Requests\UpdateContactoRequest; //importamos la validaciones
use App\Http\Requests\CreateContactoRequest;


class ContactoController extends Controller
{
    //http://127.0.0.1:8000/api/contactos lista todos
    //http://127.0.0.1:8000/api/contactos?termino= obtiene por nombre o telefono
    //GET listar contactos
    public function index( Request $request )
    {
        if ( $request->has('termino') ) {//si hay criterios de busqueda
            $resultado = 
            Contacto::where('nombre','like','%'.$request->termino.'%')
            ->orWhere('telefono', $request->telefono )
            ->get();
        } else {
            $resultado = Contacto::all();
        }
        return $resultado;
    }
    //es posible ver la imagen desde el navegador
    // http://localhost:8000/imagenes/1587967568.PNG
    private function cargarArchivo( $fichero ) {
        $nombreArchivo = time().".".$fichero->getClientOriginalExtension();
        $fichero->move( \public_path('imagenes'), $nombreArchivo );
        return $nombreArchivo;
    }
    //POST insertar contacto
    //public function store(Request $request)
    public function store( CreateContactoRequest $request )
    {
        $input = $request->all();
        if ( $request->has('foto') ) {
            $input['foto'] = $this->cargarArchivo(  $request->foto );
        }
        Contacto::create( $input );
        return  response()->json([
            'res' =>  true,
            'message' => 'contacto agregado..'
        ], 200 );
    }
    //http://127.0.0.1:8000/api/contactos/3
    //GET obtiene un registro por ID
    //public function show($id)
    public function show ( Contacto $contacto )
    {
        return $contacto;
    }
    //PUT O POST actualizar un registro
    //public function update(Request $request, $id)
    public function update(UpdateContactoRequest $request, Contacto $contacto ) 
    {
        $input = $request->all();
        
        if ( $request->has('foto') ) {
            $input['foto'] = $this->cargarArchivo(
                $request->foto
            );
        }

        $contacto->update( $input );
        return \response()->json([
            'res'=> true,
            'message' => 'Actualizado correctamente.'
        ], 200 );
    }
    //DELETE borra registro
    public function destroy($id)
    {
        Contacto::destroy( $id );
        return response()->json([
            'res'=> true,
            'message'=>'Registro borrado...'
        ],  200 );
    }
}
