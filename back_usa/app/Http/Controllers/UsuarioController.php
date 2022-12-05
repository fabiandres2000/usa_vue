<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Database\Eloquent\Model;


class UsuarioController extends Controller
{
    public function listar(){
        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->select("*")
        ->get();
        
        return response()->json([
            'usuarios' => $usuarios,
        ]);
    }

    public function login(){
        $data = request()->all();
        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["usuario"])
        ->where('password',md5($data["pass"]))
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            return response()->json([
                'respuesta' => "Bienvenido",
                'usuario' => $usuarios,
            ]);
        }else{
            return response()->json([
                'respuesta' => "Usuario o contraseña Incorrectos.",
            ]);
        }
    }
}
