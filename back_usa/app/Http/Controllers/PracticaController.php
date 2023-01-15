<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PracticaController extends Controller
{
    public function listar_convenios(){
        $convenios = DB::connection("mysql")
        ->table("convenio")
        ->where("estado", '1')
        ->select("*")
        ->get();

        foreach ($convenios as $item) {
            $fecha_actual = date('Y-m-d');
            if($item->fecha_final >= $fecha_actual){
                $item->estado = "Vigente";
            }else{
                $item->estado = "No Vigente";
            }
        }
        
        return response()->json([
            'convenios' => $convenios,
        ]);
    }

    public function registrar_convenio()
    {
        $data = request()->all();
        
        
        $documento_tmp1 = $data['documento_convenio']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
       
 
        $insert = DB::connection("mysql")
        ->table("convenio")
        ->insert([
            'nit' => $data["nit"],
            'razon_social' => $data["razon_social"],
            'direccion'=> $data["direccion"],
            'representante_legal'=> $data["representante_legal"],
            'fecha_inicio'=> $data["fecha_inicio"],
            'fecha_final'=> $data["fecha_final"],
            'campo_educativo'=> $data["campo_educativo"],
            'campo_social'=> $data["campo_social"],
            'campo_organizacional'=> $data["campo_organizacional"],
            'campo_clinico_salud'=> $data["campo_clinico_salud"],
            'campo_juridico'=> $data["campo_juridico"],
            'documento_convenio'=> $filename1,
        ]);

        if($insert){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/documentos_convenios/', $filename1);
            }

            return response()->json([
                'respuesta' => "Convenio Registrado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function editar_convenio()
    {
        $data = request()->all();
        
        File::delete(public_path('documentos_convenios/'.$data['documento_convenio_viejo']));

        $documento_tmp1 = $data['documento_convenio']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
       
 
        $update = DB::connection("mysql")
        ->table("convenio")
        ->where("id", $data['id'])
        ->update([
            'nit' => $data["nit"],
            'razon_social' => $data["razon_social"],
            'direccion'=> $data["direccion"],
            'representante_legal'=> $data["representante_legal"],
            'fecha_inicio'=> $data["fecha_inicio"],
            'fecha_final'=> $data["fecha_final"],
            'campo_educativo'=> $data["campo_educativo"],
            'campo_social'=> $data["campo_social"],
            'campo_organizacional'=> $data["campo_organizacional"],
            'campo_clinico_salud'=> $data["campo_clinico_salud"],
            'campo_juridico'=> $data["campo_juridico"],
            'documento_convenio'=> $filename1,
        ]);

        if($update){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/documentos_convenios/', $filename1);
            }

            return response()->json([
                'respuesta' => "Convenio Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function eliminar_convenio()
    {
        $data = request()->all();
        
    
        $update = DB::connection("mysql")
        ->table("convenio")
        ->where("id", $data['id'])
        ->update([
            'estado' => '0',
        ]);

        if($update){
           
            return response()->json([
                'respuesta' => "Convenio Eliminado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    #region tutores
    public function listar_tutores_usa(){
        $tutores = DB::connection("mysql")
        ->table("tutor_usa")
        ->select("*")
        ->get();

        return response()->json([
            'tutores' => $tutores,
        ]);
    }

    public function registrar_tutor_usa(){
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

            $documento_tmp1 = $data['documento_contrato']; 
            if ($documento_tmp1->isValid()) {    
                $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
            }else{
                $filename1 = "NADA";
            }
        
            $insert = DB::connection("mysql")
            ->table("tutor_usa")
            ->insertGetId([
                'nombres' => $data["nombres"],
                'apellidos' => $data["apellidos"],
                'correo'=> $data["correo"],
                'celular'=> $data["celular"],
                'cedula'=> $data["cedula"],
                'campo'=> $data["campo"],
                'fecha'=> $data["fecha"],
                'documento_contrato'=> $filename1,
            ]);
    
            if(!empty($insert)){
                  
                if ($documento_tmp1->isValid()) {    
                    $documento_tmp1->move(public_path().'/contratos_tutores_usa/', $filename1);
                }
                
                DB::connection("mysql")
                ->table("usuario")
                ->insert([
                    'correo' => $data["correo"],
                    'password' =>md5($password),
                    'nombre' => $data["nombres"]." ".$data["apellidos"],
                    'foto'=> "pic.png",
                    'tipo'=> "Tutor USA",
                    'id_tutor_usa'=> $insert,
                ]);

                $objeto = new EmailController();
                $objeto->enviar_correo($data["correo"], $data["nombres"]." ".$data["apellidos"], $password, "Registro Tutor USA");

                return response()->json([
                    'respuesta' => "Tutor Registrado Correctamente!",
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

    public function editar_tutor_usa()
    {
        $data = request()->all();
        
        File::delete(public_path('contratos_tutores_usa/'.$data['documento_contrato_viejo']));

        $documento_tmp1 = $data['documento_contrato']; 
        if ($documento_tmp1->isValid()) {    
            $filename1 = 'documento' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }
 
        $update = DB::connection("mysql")
        ->table("tutor_usa")
        ->where("id", $data['id'])
        ->update([
            'nombres' => $data["nombres"],
            'apellidos' => $data["apellidos"],
            'correo'=> $data["correo"],
            'celular'=> $data["celular"],
            'cedula'=> $data["cedula"],
            'campo'=> $data["campo"],
            'fecha'=> $data["fecha"],
            'documento_contrato'=> $filename1,
        ]);

        if($update){
                
            if ($documento_tmp1->isValid()) {    
                $documento_tmp1->move(public_path().'/contratos_tutores_usa/', $filename1);
            }

            DB::connection("mysql")
            ->table("usuario")
            ->where("id_tutor_usa", $data["id"])
            ->update([
                'correo' => $data["correo"],
                'nombre' => $data["nombres"]." ".$data["apellidos"],
            ]);

            return response()->json([
                'respuesta' => "Tutor Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function cambiar_estado_tutor_usa()
    {
        $data = request()->all();
        
        $tutor = DB::connection("mysql")
        ->table("tutor_usa")
        ->where("id", $data["id"])
        ->select("*")
        ->first();

        if($tutor->estado == 1){
            $update = DB::connection("mysql")
            ->table("tutor_usa")
            ->where("id", $data['id'])
            ->update([
                'estado' => '0',
            ]);
        }else{
            $update = DB::connection("mysql")
            ->table("tutor_usa")
            ->where("id", $data['id'])
            ->update([
                'estado' => '1',
            ]);
        }

        if($update){
           
            return response()->json([
                'respuesta' => "Estado Actualizado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function listar_tutores_sp(){
        $tutores = DB::connection("mysql")
        ->table("tutor_sp")
        ->join("convenio","convenio.id","tutor_sp.id_convenio")
        ->select("tutor_sp.*","convenio.razon_social")
        ->get();

        return response()->json([
            'tutores' => $tutores,
        ]);
    }

    public function registrar_tutor_sp(){
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
            ->table("tutor_sp")
            ->insertGetId([
                'nombres' => $data["nombres"],
                'apellidos' => $data["apellidos"],
                'correo'=> $data["correo"],
                'celular'=> $data["celular"],
                'cedula'=> $data["cedula"],
                'campo'=> $data["campo"],
                'fecha'=> $data["fecha"],
                'id_convenio'=> $data["convenio"],
            ]);
    
            if(!empty($insert)){
             
                DB::connection("mysql")
                ->table("usuario")
                ->insert([
                    'correo' => $data["correo"],
                    'password' =>md5($password),
                    'nombre' => $data["nombres"]." ".$data["apellidos"],
                    'foto'=> "pic.png",
                    'tipo'=> "Tutor SP",
                    'id_tutor_sp'=> $insert,
                ]);

                $objeto = new EmailController();
                $objeto->enviar_correo($data["correo"], $data["nombres"]." ".$data["apellidos"], $password, "Registro Tutor SP");

                return response()->json([
                    'respuesta' => "Tutor Registrado Correctamente!",
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

    public function editar_tutor_sp()
    {
        $data = request()->all();
       
        $tutor_viejo = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("id", $data["id"])
        ->select("*")
        ->first();
 
        $update = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("id", $data['id'])
        ->update([
            'nombres' => $data["nombres"],
            'apellidos' => $data["apellidos"],
            'correo'=> $data["correo"],
            'celular'=> $data["celular"],
            'cedula'=> $data["cedula"],
            'campo'=> $data["campo"],
            'fecha'=> $data["fecha"],
            'id_convenio'=> $data["convenio"],
        ]);

        if($update){
                
            DB::connection("mysql")
            ->table("usuario")
            ->where("id_tutor_sp",$data['id'])
            ->update([
                'correo' => $data["correo"],
                'nombre' => $data["nombres"]." ".$data["apellidos"],
            ]);

            return response()->json([
                'respuesta' => "Tutor Modificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function cambiar_estado_tutor_sp()
    {
        $data = request()->all();
        
        $tutor = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("id", $data["id"])
        ->select("*")
        ->first();

        if($tutor->estado == 1){
            $update = DB::connection("mysql")
            ->table("tutor_sp")
            ->where("id", $data['id'])
            ->update([
                'estado' => '0',
            ]);
        }else{
            $update = DB::connection("mysql")
            ->table("tutor_sp")
            ->where("id", $data['id'])
            ->update([
                'estado' => '1',
            ]);
        }

        if($update){
           
            return response()->json([
                'respuesta' => "Estado Actualizado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }
    #endregion tutores

    #region asignacion
    public function listar_estudiantes_no_asignados(){
        $estudiantes_no_asignados = DB::connection("mysql")
        ->table("estudiante")
        ->where("asignado", '0')
        ->where(function ($query) {
            $query->where('semestre', '=', 'X')
                  ->orWhere('semestre', '=', 'IX');
        })
        ->select("*")
        ->orderBy("cedula","asc")
        ->get();

        return response()->json([
            'estudiantes_no_asignados' => $estudiantes_no_asignados,
        ]);
    }

    public function listar_estudiantes_asignados(){
        $estudiantes_asignados = DB::connection("mysql")
        ->table("estudiante")
        ->where("asignado", '1')
        ->select("*")
        ->get();

        return response()->json([
            'estudiantes_asignados' => $estudiantes_asignados,
        ]);
    }

    public function listar_convenios_vigentes(){
        $convenios = DB::connection("mysql")
        ->table("convenio")
        ->where("estado", '1')
        ->select("*")
        ->get();

        $convenios_vigentes = array();

        foreach ($convenios as $item) {
            $fecha_actual = date('Y-m-d');
            if($item->fecha_final >= $fecha_actual){
                array_push($convenios_vigentes, $item);
            }
        }
        
        return response()->json([
            'convenios_vigentes' => $convenios_vigentes,
        ]);
    }

    public function tutores_sp_por_convenio(){
        $data = request()->all();

        $tutores_sp = DB::connection("mysql")
        ->table("tutor_sp")
        ->where("estado", '1')
        ->where("id_convenio", $data["id"])
        ->select("*")
        ->get();

        return response()->json([
            'tutores_sp' => $tutores_sp,
        ]);
    }

    public function asignar_practica(){

        $data = request()->all();

        $arl = $data['arl']; 
        $comunicado = request()->get("comunicado");

        if ($arl->isValid()) {    
            $filename1 = 'arl_' . date('Y_m_d_h_i_s_A').".".$arl->getClientOriginalExtension();
        }else{
            $filename1 = "NADA";
        }

        $comunicado = $data['comunicado'];
        if ($comunicado->isValid()) {    
            $filename2 = 'comunicado_' . date('Y_m_d_h_i_s_A').".".$comunicado->getClientOriginalExtension();
        }else{
            $filename2 = "NADA";
        }

        $estudiante = json_decode($data["estudiante"]);
        $convenio = json_decode($data["convenio"]);
        $tutor_sp = json_decode($data["tutor_sp"]);
        $tutor_usa = json_decode($data["tutor_usa"]);

        $insert = DB::connection("mysql")
        ->table("asignacion_practica")
        ->insert([
            'id_estudiante' => $estudiante->id,
            'id_convenio' => $convenio->id,
            'id_tutor_sp'=> $tutor_sp->id,
            'id_tutor_usa'=> $tutor_usa->id,
            'campo'=> $data["campo"],
            'fecha_inicio'=> $data["fecha_inicio"],
            'fecha_final'=> $data["fecha_final"],
            'arl'=> $filename1,
            'comunicado'=> $filename2,
        ]);

        if($insert){
            DB::connection("mysql")
            ->table("estudiante")
            ->where("id", $estudiante->id)
            ->update([
                'asignado' => '1',
            ]);

            if ($arl->isValid()) {    
                $arl->move(public_path().'/asignaciones/arl/', $filename1);
            }

            if ($comunicado->isValid()) {    
                $comunicado->move(public_path().'/asignaciones/comunicado/', $filename2);
            }

            $usuario_estudiante =  DB::connection("mysql")
            ->table("usuario")
            ->where("id_estudiante", $estudiante->id)
            ->select("*")
            ->first();

            $objeto = new EmailController();
            $objeto->enviar_correo_asignacion($usuario_estudiante->correo, $estudiante->nombre, '1', "Asignación de practicas", $tutor_sp->nombres." ".$tutor_sp->apellidos, $tutor_usa->nombres." ".$tutor_usa->apellidos, $estudiante->nombre, $convenio->razon_social, $data["fecha_inicio"]." hasta ".$data["fecha_final"]);
            $objeto->enviar_correo_asignacion($tutor_sp->correo, $tutor_sp->nombres." ".$tutor_sp->apellidos, '2', "Asignación de practicas", $tutor_sp->nombres." ".$tutor_sp->apellidos, $tutor_usa->nombres." ".$tutor_usa->apellidos, $estudiante->nombre, $convenio->razon_social, $data["fecha_inicio"]." hasta ".$data["fecha_final"]);
            $objeto->enviar_correo_asignacion($tutor_usa->correo, $tutor_usa->nombres." ".$tutor_usa->apellidos, '3', "Asignación de practicas", $tutor_sp->nombres." ".$tutor_sp->apellidos, $tutor_usa->nombres." ".$tutor_usa->apellidos, $estudiante->nombre, $convenio->razon_social, $data["fecha_inicio"]." hasta ".$data["fecha_final"]);

            return response()->json([
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, con el estudiante ".$estudiante->nombre,
                'codigo' => 0,
            ]);
        }
    }

    public function listar_asignaciones(){
        $asignaciones = DB::connection("mysql")
        ->table("asignacion_practica")
        ->join("estudiante","estudiante.id","asignacion_practica.id_estudiante")
        ->join("convenio","convenio.id","asignacion_practica.id_convenio")
        ->join("tutor_sp","tutor_sp.id","asignacion_practica.id_tutor_sp")
        ->join("tutor_usa","tutor_usa.id","asignacion_practica.id_tutor_usa")
        ->select("asignacion_practica.id", "asignacion_practica.campo", "asignacion_practica.arl", "asignacion_practica.comunicado", "estudiante.nombre as estudiante", "estudiante.semestre",  "estudiante.id as id_estudiante", "convenio.razon_social as sp")
        ->selectRaw("CONCAT(tutor_sp.nombres,' ',tutor_sp.apellidos) AS tutor_sp")
        ->selectRaw("CONCAT(tutor_usa.nombres,' ',tutor_usa.apellidos) AS tutor_usa")
        ->selectRaw("CONCAT(asignacion_practica.fecha_inicio,' / ',asignacion_practica.fecha_final) AS fecha")
        ->get();

        return response()->json([
            'asignaciones' => $asignaciones,
        ]);
    }
    
    public function eliminar_asignacion()
    {
        $data = request()->all();
        
        $delete = DB::connection("mysql")
        ->table("asignacion_practica")
        ->where("id", $data["id"])
        ->delete();

        if($delete){
            $update = DB::connection("mysql")
            ->table("estudiante")
            ->where("id", $data['id_estudiante'])
            ->update([
                'asignado' => '0',
            ]);

            if($update){
                return response()->json([
                    'respuesta' => "Asignación Eliminada Correctamente!",
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
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }
    }

    public function verificar_asignacion(){

        $data = request()->all();

        $asignacion = DB::connection("mysql")
        ->table("asignacion_practica")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        return response()->json([
            'asignacion' => $asignacion,
        ]);
    }
    #endregion asignacion

    #region practicas
    public function registrar_practica(){
        $data = request()->all();


        $ins_1 = $data["ins_1"];
        if($ins_1 == "si"){
            $documento_tmp1 = $data['excel_1_R']; 
            $filename1 = 'excel_1_R' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();  
            $cual_ins_1 = $data["cual_ins_1"];
        }else{
            $cual_ins_1 = "Ninguno";
            $filename1 = "";
        }
    
        $ins_2 = $_POST["ins_2"];
        if($ins_2 == "si"){
            $documento_tmp2 = $data['excel_2_R']; 
            $filename2 = 'excel_2_R' . date('Y_m_d_h_i_s_A').".".$documento_tmp2->getClientOriginalExtension(); 
            $cual_ins_2 = $data["cual_ins_2"];
        }else{
            $cual_ins_2 = "Ninguno";
            $filename2 = "";
        }

        $proyecto = $data['proyecto']; 
        $filename3 = 'practica' . date('Y_m_d_h_i_s_A').".".$proyecto->getClientOriginalExtension(); 

        $insert = DB::connection("mysql")
        ->table("practica")
        ->insert([
            'nombre_completo' => $data["nombre"],
            'semestre' => $data["semestre"],
            'fecha'=> $data["periodo"],
            'tema'=> $data["tema"],
            'sitio'=> $data["sitio"],
            'tutor_sp'=> $data["tutor_sitio"],
            'valoracion_tutor_sp'=> $data["valoracion_sitio"],
            'tutor_usa'=> $data["tutor_usa"],
            'valoracion_tutor_usa'=> $data["valoracion_usa"],
            'proyecto'=> $filename3,
            'aplico_instrumento'=> $ins_1,
            'instrumento'=> $cual_ins_1,
            'excel_1'=> $filename1,
            'aplico_instrumento_2'=> $ins_2,
            'instrumento_2'=> $cual_ins_2,
            'excel_2'=> $filename2,
            'id_estudiante'=> $data["id_estudiante"],
        ]);

        if($insert){

            if($ins_1 == "si"){
                $documento_tmp1 = $data['excel_1_R'];   
                $documento_tmp1->move(public_path().'/archivos_practica/', $filename1);
            } 
            
            if($ins_2 == "si"){
                $documento_tmp2 = $data['excel_2_R'];   
                $documento_tmp2->move(public_path().'/archivos_practica/', $filename2);
            } 

            $proyecto->move(public_path().'/archivos_practica/', $filename3);
           
            return response()->json([
                'respuesta' => "Practica Registrada Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function verificar_registro(){

        $data = request()->all();

        $registro = DB::connection("mysql")
        ->table("practica")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        return response()->json([
            'registro' => $registro,
        ]);
    }

    public function editar_practica(){
        $data = request()->all();
        $fileName1 = NULL;
        $fileName2 = NULL;
        $fileNameProyecto = NULL;

        $registro = DB::connection("mysql")
        ->table("practica")
        ->where("id", $data["id_practica"])
        ->select("*")
        ->first();
        
        $ins_1 = $data["ins_1"];
        if($ins_1 == "si"){
            $cual_ins_1 = $data["cual_ins_1"];
            if(isset($data['excel_1_R'])){
                $documento_tmp1 = $data['excel_1_R'];   
                $filename1 = 'excel_1_R' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();  
            }else{
                $fileName1 = NULL;
            }

        }else{
            File::delete(public_path('archivos_practica/'.$registro->excel_1));
            $cual_ins_1 = "Ninguno";
            $fileName1 = "";
        }

        $ins_2 = $data["ins_2"];
        if($ins_2 == "si"){
            $cual_ins_2 = $data["cual_ins_2"];    
            if(isset($data['excel_2_R'])){
                $documento_tmp2 = $data['excel_2_R'];   
                $filename2 = 'excel_2_R' . date('Y_m_d_h_i_s_A').".".$documento_tmp2->getClientOriginalExtension();  
            }else{
                $fileName2 = NULL;
            }

        }else{
            File::delete(public_path('archivos_practica/'.$registro->excel_2));
            $cual_ins_2 = "Ninguno";
            $fileName2 = "";
        }

        $proyecto = $data['proyecto']; 
        $fileNameProyecto = 'practica' . date('Y_m_d_h_i_s_A').".".$proyecto->getClientOriginalExtension(); 

        $id_practica = $data["id_practica"];

        $update = DB::connection("mysql")
        ->table("practica")
        ->where('id', $id_practica)
        ->update([
            'nombre_completo' => $data["nombre"],
            'semestre' => $data["semestre"],
            'fecha'=> $data["periodo"],
            'tema'=> $data["tema"],
            'sitio'=> $data["sitio"],
            'tutor_sp'=> $data["tutor_sitio"],
            'valoracion_tutor_sp'=> $data["valoracion_sitio"],
            'tutor_usa'=> $data["tutor_usa"],
            'valoracion_tutor_usa'=> $data["valoracion_usa"],
            'proyecto'=> $fileNameProyecto,
            'aplico_instrumento'=> $ins_1,
            'instrumento'=> $cual_ins_1,
            'aplico_instrumento_2'=> $ins_2,
            'instrumento_2'=> $cual_ins_2,
        ]);

        if($update){
            if(isset($filename1)){

                File::delete(public_path('archivos_practica/'.$registro->excel_1));

                DB::connection("mysql")
                ->table("practica")
                ->where('id', $id_practica)
                ->update([
                    'excel_1' => $filename1,
                ]);

                if(isset($data['excel_1_R'])){
                    $documento_tmp1 = $data['excel_1_R'];   
                    $documento_tmp1->move(public_path().'/archivos_practica/', $filename1);
                }
            }
        
            if(isset($filename2)){
                
                File::delete(public_path('archivos_practica/'.$registro->excel_2));

                DB::connection("mysql")
                ->table("practica")
                ->where('id', $id_practica)
                ->update([
                    'excel_2' => $filename2,
                ]);

                if(isset($data['excel_2_R'])){
                    $documento_tmp2 = $data['excel_2_R'];   
                    $documento_tmp2->move(public_path().'/archivos_practica/', $filename2);
                }
            }
        
            if(isset($fileNameProyecto)){

                File::delete(public_path('archivos_practica/'.$registro->proyecto));
                
                DB::connection("mysql")
                ->table("practica")
                ->where('id', $id_practica)
                ->update([
                    'proyecto' => $fileNameProyecto,
                ]);

                $proyecto->move(public_path().'/archivos_practica/', $fileNameProyecto);
            }
       
            return response()->json([
                'respuesta' => "Practica Modificada Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }
    }
    #endregion practicas

    public function mis_asignaciones(){

        $data = request()->all();

        if($data["tipo"] == 1){
            $asignaciones = DB::connection("mysql")
            ->table("asignacion_practica")
            ->join("estudiante","estudiante.id","asignacion_practica.id_estudiante")
            ->where("asignacion_practica.id_tutor_sp", $data["id"])
            ->select("asignacion_practica.*","estudiante.nombre","estudiante.semestre","estudiante.cedula")
            ->get();
        }else{
            $asignaciones = DB::connection("mysql")
            ->table("asignacion_practica")
            ->join("estudiante","estudiante.id","asignacion_practica.id_estudiante")
            ->where("asignacion_practica.id_tutor_usa", $data["id"])
            ->select("asignacion_practica.*","estudiante.nombre","estudiante.semestre","estudiante.cedula")
            ->get();
        }

        foreach ($asignaciones as $key) {
           $key->practica = DB::connection("mysql")
           ->table("practica")
           ->where("id_estudiante", $key->id_estudiante)
           ->select("practica.*")
           ->first();
        }
        
        return response()->json([
            'asignaciones' => $asignaciones,
        ]);
    }

    public function registrar_observacion(){
        $data = request()->all();

        $documento_tmp1 = $data['file_obs']; 
        $filename = 'observacion_' . date('Y_m_d_h_i_s_A').".".$documento_tmp1->getClientOriginalExtension();  
    

        $insert = DB::connection("mysql")
        ->table("observacion")
        ->insert([
            'id_practica' => $data["id_practica"],
            'observaciones' => $data["observaciones"],
            'archivo'=> $filename,
            'fecha_observacion'=> date('d-m-Y'),
            'hora_observacion'=> date('h:i:s'),
            'id_tutor'=> $data["id_tutor"],
            'tipo'=> $data["tipo"],
            'tipo_obs'=> $data["tipo_obs"],
        ]);

        if($insert){

            $documento_tmp1->move(public_path().'/archivos_observacion/', $filename);
           
            return response()->json([
                'respuesta' => "Observación Registrada Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function mis_observaciones_tutor(){
        $data = request()->all();
        $observaciones = DB::connection("mysql")
        ->table("observacion")
        ->join("practica","practica.id","observacion.id_practica")
        ->join("estudiante","estudiante.id","practica.id_estudiante")
        ->where("observacion.id_tutor", $data["id"])
        ->where("observacion.tipo", $data["tipo"])
        ->select("estudiante.cedula","estudiante.nombre","practica.tema","observacion.*")
        ->get();

        return response()->json([
            'observaciones' => $observaciones,
        ]);
    }


    public function mis_observaciones_estudiante(){
        $data = request()->all();

        $observaciones = DB::connection("mysql")
        ->table("observacion")
        ->join("practica","practica.id","observacion.id_practica")
        ->join("estudiante","estudiante.id","practica.id_estudiante")
        ->where("estudiante.id", $data["id"])
        ->select("observacion.*")
        ->get();

        foreach ($observaciones as $key) {
            if($key->tipo == "USA"){
                $key->tutor = DB::connection("mysql")
                ->table("tutor_usa")
                ->where("tutor_usa.id", $key->id_tutor)
                ->select("*")
                ->first();
            }else{
                $key->tutor = DB::connection("mysql")
                ->table("tutor_sp")
                ->where("tutor_sp.id", $key->id_tutor)
                ->select("*")
                ->first();
            }
        }

        return response()->json([
            'observaciones' => $observaciones,
        ]);
    }
}
