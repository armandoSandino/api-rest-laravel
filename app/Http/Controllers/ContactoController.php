<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contacto;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    //http://127.0.0.1:8000/api/contactos/3
    //GET obtiene un registro por ID
    //public function show($id)
    public function show ( Contacto $contacto )
    {
        return $contacto;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
