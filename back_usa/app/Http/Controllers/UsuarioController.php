<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Http\Controllers\EmailController;


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
                'codigo' => 1,
            ]);
        }else{
            return response()->json([
                'respuesta' => "Usuario o contraseña Incorrectos.",
                'codigo' => 0,
            ]);
        }
    }

    public function registro_usuario(){
        $data = request()->all();
        $password = Hash::make(Str::random(8));

        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["correo"])
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            return response()->json([
                'respuesta' => "Existe un usuaio registrado con ese correo.",
                'codigo' => 0,
            ]);
        }else{
            if($data["tipo_registro"] == "Estudiante"){
                $id = DB::connection("mysql")
                ->table("estudiante")
                ->insertGetId([
                    'cedula' => $data["cedula"],
                    'nombre' => $data["nombre"],
                    'celular'=> $data["celular"],
                    'semestre'=> $data["semestre"],
                    'periodo'=> $data["periodo"],
                ]);
    
                $insert = DB::connection("mysql")
                ->table("usuario")
                ->insert([
                    'correo' => $data["correo"],
                    'password' =>md5($password),
                    'nombre' => $data["nombre"],
                    'foto'=> "pic.png",
                    'tipo'=> $data["tipo_registro"],
                    'id_estudiante'=> $id,
                ]);
            }
            
            if($insert){
                
                $objeto = new EmailController();
                $objeto->enviar_correo($data["correo"], $data["nombre"], $password, "Registro de Usuario");

                return response()->json([
                    'respuesta' => "Usuario Registrado Correctamente!",
                    'codigo' => 1,
                ]);
            }else{
                return response()->json([
                    'respuesta' => "Ocurrio un error, intente mas tarde.",
                    'codigo' => 0,
                ]);
            }
        }  
    }

    public function recuperar_password(){
        $data = request()->all();
        $password = Hash::make(Str::random(8));

        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["correo"])
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            $update = DB::connection("mysql")
            ->table("usuario")
            ->where("correo", $data["correo"])
            ->update(['password' =>md5($password)]);
            
            if($update){
                $objeto = new EmailController();
                $objeto->enviar_correo($usuarios[0]->correo, $usuarios[0]->nombre, $password, "Cambio de contraseña");
                return response()->json([
                    'respuesta' => "Se envio un correo electrónico con la nueva contraseña.",
                    'codigo' => 1,
                ]);
            }else{
                return response()->json([
                    'respuesta' => "Ocurrio un error, intente mas tarde.",
                    'codigo' => 0,
                ]);
            }
        }else{
            return response()->json([
                'respuesta' => "No existe un usuaio registrado con ese correo.",
                'codigo' => 0,
            ]);
        }

    }

    public function asignar_permiso(){
        $data = request()->all();
        $password = Hash::make(Str::random(8));

        $usuarios = DB::connection("mysql")
        ->table("usuario")
        ->where("correo", $data["correo"])
        ->select("*")
        ->get();

        if(count($usuarios) != 0){
            return response()->json([
                'respuesta' => "Existe un usuaio registrado con ese correo.",
                'codigo' => 0,
            ]);
        }else{
            $insert = DB::connection("mysql")
            ->table("usuario")
            ->insert([
                'correo' => $data["correo"],
                'password' =>md5($password),
                'nombre' => $data["nombre"],
                'foto'=> "pic.png",
                'tipo'=> $data["tipo_registro"],
            ]);
        }

        if($insert){
            $objeto = new EmailController();
            $objeto->enviar_correo($data["correo"], $data["nombre"], $password, "Permiso a modulo (".$data["tipo_registro"].") asignado");

            return response()->json([
                'respuesta' => "Permiso asignado correctamente!",
                'codigo' => 1,
            ]);
        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }
    }
}
