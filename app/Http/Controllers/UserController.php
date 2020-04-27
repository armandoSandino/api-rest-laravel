<?php

namespace App\Http\Controllers;

use App\User;//modelo user

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

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
}
