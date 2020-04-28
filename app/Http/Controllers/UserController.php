<?php

namespace App\Http\Controllers;

use App\User;//modelo user

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;// para hashear contraseña

use Illuminate\Support\Str;//generacion aleatoria

class UserController extends Controller
{
    public function store( Request $request ) {

        $input = $request->all();

        $input['password'] = Hash::make( $request->password );

        User::create( $input );
        return response()->json([
            'res'=> true,
            'message' => 'usuario creado exitosamente.'
        ], 200 );
    }

    public function login( Request $request ) {

        $user = User::whereEmail( $request->email)->first();

        if ( !is_null( $user ) && Hash::check( $request->password, $user->password ) ) {
            
            //$user->api_token = Str::random( 100 );
            //$user->save();
            //crea un token y le especificas el nombre de la app.
            $token = $user->createToken( 'contactos')->accessToken;

            return response()->json([
                'res' => true,
                //'token' => $user->api_token,
                'token' => $token,
                'message' => 'Estas dentro del sistema, bienvenido..',
            ], 200 );
        } else {
            return response()->json([
                'res' =>  false,
                'message' => ' tus credenciales no son correctas.'
            ], 500 );
        }
    }
    public function logout() {
        $user = auth()->user();
        //$user->api_token = null;
        //se recorren todos los token del usuario y se borran.
        $user->tokens->each( function ( $token, $key ) {
            $token->delete();
        });
        $user->save();

        return response()->json([
            'res'=> true,
            'message'=> 'Sistema cerrado....'
        ], 200);
    }
}
