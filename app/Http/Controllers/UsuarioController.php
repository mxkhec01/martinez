<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



    public function login(Request $request) {
        $fields = $request->validate([
            'app_usr' => 'required|string',
            'app_pass' => 'required|string'

        ]);
        $user = Operador::where('usuario',$fields['app_usr'])->first();

        //dd(bcrypt($fields['app_pass']));

        if(!$user ||  md5($fields['app_pass']) != $user->password ) {
            //
            return response ([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = $user->createToken('tortonToken')->plainTextToken;

        $response = [
            'operador' => $user,
            'token'     => $token
        ];
        return response($response,201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }


    public function obten_viajes($id) {
        $viajes =  Viaje::with(['entregas','entregas.facturas','entregas.cliente','unidad'])->where('operador_id',$id)->where('estado','activo')->get();

        if ($viajes->count() > 0) {
            $response = $viajes->toJson(JSON_PRETTY_PRINT) ;

            return response($response,200);

        }

        return response ([
            'message' => 'No hay viajes asignados'
        ], 404);
  }
}
