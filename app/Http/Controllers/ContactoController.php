<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contacto;

class ContactoController extends Controller
{
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
