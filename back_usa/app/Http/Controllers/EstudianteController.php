<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EstudianteController extends Controller
{
    public function consultar_estudiante(){

        $data = request()->all();

        $estudiante = DB::connection("mysql")
        ->table("estudiante")
        ->where("id", $data["id"])
        ->select("*")
        ->first();

        return response()->json([
            'estudiante' => $estudiante,
        ]);
    }

    public function guardar_sociodemografico()
    {
        $data = request()->all();
 
        $insert = DB::connection("mysql")
        ->table("sociodemografico")
        ->insert([
            'id_estudiante' => $data["id_estudiante"],
            'nombre' => $data["nombre"],
            'semestre'=> $data["semestre"],
            'tipo_id'=> $data["tipo_id"],
            'identifi'=> $data["id"],
            'edad'=> $data["edad"],
            'sexo'=> $data["sexo"],
            'estrato'=> $data["estrato"],
            'celular'=> $data["celular"],
            'ciudad'=> $data["ciudad"],
            'cantidad_hijos'=> $data["cantidad_hijos"],
            'dependencia' => $data["dependencia"],
            'sustancias' => $data["sustancias"],
            'frecuencia'=> $data["frecuencia"],
            'tratamiento'=> $data["tratamiento"],
            'cantidad_labora'=> $data["cantidad_labora"],
            'ciudad_uni'=> $data["ciudad_uni"],
            'personas_estudia'=> $data["personas_estudia_array"],
            'actividad_fisica'=> $data["actividad_fisica"],
            'intensidad_fisica'=> $data["intensidad_fisica"],
            'actividades'=> $data["actividades_array"],
            'horas'=> $data["horas"],
            'enfermedad' => $data["enfermedad"],
            'cual_enfermedad'=> $data["cual_enfermedad"],
            'comidas'=> $data["comidas_array"],
            'icfes'=> $data["icfes"],
            'promedio'=> $data["promedio"],
            'periodo'=> $data["periodo"],
            'edad_madre'=> $data["edad_madre"],
            'estudios_madre'=> $data["estudios_madre"],
            'dedicacion_madre'=> $data["dedicacion_madre"],
            'edad_padre'=> $data["edad_padre"],
            'estudios_padre'=> $data["estudios_padre"],
            'dedicacion_padre'=> $data["dedicacion_padre"],
        ]);

        if($insert){
                
            return response()->json([
                'respuesta' => "Respuestas Guardadas Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }

    }

    public function consultar_socio(){

        $data = request()->all();

        $socio = DB::connection("mysql")
        ->table("sociodemografico")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        return response()->json([
            'socio' => $socio,
        ]);
    }

    public function verificar_paso_personalidad(){

        $data = request()->all();

        $personalidad = DB::connection("mysql")
        ->table("personalidad_respuestas")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        if($personalidad == null){
            DB::connection("mysql")
            ->table("personalidad_respuestas")
            ->insert([
                'id_estudiante' => $data["id"],
                'bloque_1' => 0,
                'bloque_2' => 0,
                'bloque_3' => 0,
                'bloque_4' => 0,
                'bloque_5' => 0,
                'bloque_6' => 0,
                'estado_calificado' => 0,
            ]);
      
            return response()->json([
                'paso' => 1,
            ]);
        }else{
            if($personalidad->bloque_1 == 0 && $personalidad->bloque_2 == 0 && $personalidad->bloque_3 == 0 && $personalidad->bloque_4 == 0 && $personalidad->bloque_5 == 0 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 1,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 0 && $personalidad->bloque_3 == 0 && $personalidad->bloque_4 == 0 && $personalidad->bloque_5 == 0 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 2,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 0 && $personalidad->bloque_4 == 0 && $personalidad->bloque_5 == 0 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 3,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 1 && $personalidad->bloque_4 == 0 && $personalidad->bloque_5 == 0 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 4,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 1 && $personalidad->bloque_4 == 1 && $personalidad->bloque_5 == 0 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 5,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 1 && $personalidad->bloque_4 == 1 && $personalidad->bloque_5 == 1 && $personalidad->bloque_6 == 0){
                return response()->json([
                    'paso' => 6,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 1 && $personalidad->bloque_4 == 1 && $personalidad->bloque_5 == 1 && $personalidad->bloque_6 == 1 && $personalidad->estado_calificado == 0){
                return response()->json([
                    'paso' => 7,
                ]);
            }

            if($personalidad->bloque_1 == 1 && $personalidad->bloque_2 == 1 && $personalidad->bloque_3 == 1 && $personalidad->bloque_4 == 1 && $personalidad->bloque_5 == 1 && $personalidad->bloque_6 == 1   && $personalidad->estado_calificado == 1){
                return response()->json([
                    'paso' => 8,
                ]);
            }
        }

    }

    public function guardar_respuesta_personalidad(){

        $data = request()->all();

        $paso =  $data['paso'];
        $id_estudiante =  $data['id_estudiante'];
        $preg_1 =  $data['preg_1'];
        $preg_2 =  $data['preg_2'];
        $preg_3 =  $data['preg_3'];
        $preg_4 =  $data['preg_4'];
        $preg_5 =  $data['preg_5'];
        $preg_6 =  $data['preg_6'];
        $preg_7 =  $data['preg_7'];
        $preg_8 =  $data['preg_8'];
        $preg_9 =  $data['preg_9'];
        $preg_10 =  $data['preg_10'];
        $preg_11 =  $data['preg_11'];
        $preg_12 =  $data['preg_12'];
        $preg_13 =  $data['preg_13'];
        $preg_14 =  $data['preg_14'];
        $preg_15 =  $data['preg_15'];
        $preg_16 =  $data['preg_16'];
        $preg_17 =  $data['preg_17'];
        $preg_18 =  $data['preg_18'];
        $preg_19 =  $data['preg_19'];
        $preg_20 =  $data['preg_20'];
        $preg_21 =  $data['preg_21'];
        $preg_22 =  $data['preg_22'];
        $preg_23 =  $data['preg_23'];
        $preg_24 =  $data['preg_24'];
        $preg_25 =  $data['preg_25'];
        $preg_26 =  $data['preg_26'];
        $preg_27 =  $data['preg_27'];
        $preg_28 =  $data['preg_28'];
        $preg_29 =  $data['preg_29'];
        $preg_30 =  $data['preg_30'];
        $preg_31 =  $data['preg_31'];
        $preg_32 =  $data['preg_32'];
        $preg_33 =  $data['preg_33'];
        $preg_34 =  $data['preg_34'];
        $preg_35 =  $data['preg_35'];
        $preg_36 =  $data['preg_36'];
        $preg_37 =  $data['preg_37'];
        $preg_38 =  $data['preg_38'];
        $preg_39 =  $data['preg_39'];
        $preg_40 =  $data['preg_40'];
        
        if($paso == 1){
           $sql = "UPDATE `personalidad_respuestas` SET `preg_1`=$preg_1,`preg_2`=$preg_2,`preg_3`=$preg_3,`preg_4`=$preg_4,`preg_5`=$preg_5,`preg_6`=$preg_6,`preg_7`=$preg_7,`preg_8`=$preg_8,`preg_9`=$preg_9,`preg_10`=$preg_10,`preg_11`=$preg_11,`preg_12`=$preg_12,`preg_13`=$preg_13,`preg_14`=$preg_14,`preg_15`=$preg_15,`preg_16`=$preg_16,`preg_17`=$preg_17,`preg_18`=$preg_18,`preg_19`=$preg_19,`preg_20`=$preg_20,`preg_21`=$preg_21,`preg_22`=$preg_22,`preg_23`=$preg_23,`preg_24`=$preg_24,`preg_25`=$preg_25,`preg_26`=$preg_26,`preg_27`=$preg_27,`preg_28`=$preg_28,`preg_29`=$preg_29,`preg_30`=$preg_30,`preg_31`=$preg_31,`preg_32`=$preg_32,`preg_33`=$preg_33,`preg_34`=$preg_34,`preg_35`=$preg_35,`preg_36`=$preg_36,`preg_37`=$preg_37,`preg_38`=$preg_38,`preg_39`=$preg_39,`preg_40`=$preg_40,`bloque_1`=1 WHERE `id_estudiante` = $id_estudiante";       
        }
        if($paso == 2){
           $sql = "UPDATE `personalidad_respuestas` SET `preg_41`=$preg_1,`preg_42`=$preg_2,`preg_43`=$preg_3,`preg_44`=$preg_4,`preg_45`=$preg_5,`preg_46`=$preg_6,`preg_47`=$preg_7,`preg_48`=$preg_8,`preg_49`=$preg_9,`preg_50`=$preg_10,`preg_51`=$preg_11,`preg_52`=$preg_12,`preg_53`=$preg_13,`preg_54`=$preg_14,`preg_55`=$preg_15,`preg_56`=$preg_16,`preg_57`=$preg_17,`preg_58`=$preg_18,`preg_59`=$preg_19,`preg_60`=$preg_20,`preg_61`=$preg_21,`preg_62`=$preg_22,`preg_63`=$preg_23,`preg_64`=$preg_24,`preg_65`=$preg_25,`preg_66`=$preg_26,`preg_67`=$preg_27,`preg_68`=$preg_28,`preg_69`=$preg_29,`preg_70`=$preg_30,`preg_71`=$preg_31,`preg_72`=$preg_32,`preg_73`=$preg_33,`preg_74`=$preg_34,`preg_75`=$preg_35,`preg_76`=$preg_36,`preg_77`=$preg_37,`preg_78`=$preg_38,`preg_79`=$preg_39,`preg_80`=$preg_40,`bloque_2`=1 WHERE `id_estudiante` = $id_estudiante";       
        }
        if($paso == 3){
           $sql = "UPDATE `personalidad_respuestas` SET `preg_81`=$preg_1,`preg_82`=$preg_2,`preg_83`=$preg_3,`preg_84`=$preg_4,`preg_85`=$preg_5,`preg_86`=$preg_6,`preg_87`=$preg_7,`preg_88`=$preg_8,`preg_89`=$preg_9,`preg_90`=$preg_10,`preg_91`=$preg_11,`preg_92`=$preg_12,`preg_93`=$preg_13,`preg_94`=$preg_14,`preg_95`=$preg_15,`preg_96`=$preg_16,`preg_97`=$preg_17,`preg_98`=$preg_18,`preg_99`=$preg_19,`preg_100`=$preg_20,`preg_101`=$preg_21,`preg_102`=$preg_22,`preg_103`=$preg_23,`preg_104`=$preg_24,`preg_105`=$preg_25,`preg_106`=$preg_26,`preg_107`=$preg_27,`preg_108`=$preg_28,`preg_109`=$preg_29,`preg_110`=$preg_30,`preg_111`=$preg_31,`preg_112`=$preg_32,`preg_113`=$preg_33,`preg_114`=$preg_34,`preg_115`=$preg_35,`preg_116`=$preg_36,`preg_117`=$preg_37,`preg_118`=$preg_38,`preg_119`=$preg_39,`preg_120`=$preg_40,`bloque_3`=1 WHERE `id_estudiante` = $id_estudiante";          
        }
        if($paso == 4){
           $sql = "UPDATE `personalidad_respuestas` SET `preg_121`=$preg_1,`preg_122`=$preg_2,`preg_123`=$preg_3,`preg_124`=$preg_4,`preg_125`=$preg_5,`preg_126`=$preg_6,`preg_127`=$preg_7,`preg_128`=$preg_8,`preg_129`=$preg_9,`preg_130`=$preg_10,`preg_131`=$preg_11,`preg_132`=$preg_12,`preg_133`=$preg_13,`preg_134`=$preg_14,`preg_135`=$preg_15,`preg_136`=$preg_16,`preg_137`=$preg_17,`preg_138`=$preg_18,`preg_139`=$preg_19,`preg_140`=$preg_20,`preg_141`=$preg_21,`preg_142`=$preg_22,`preg_143`=$preg_23,`preg_144`=$preg_24,`preg_145`=$preg_25,`preg_146`=$preg_26,`preg_147`=$preg_27,`preg_148`=$preg_28,`preg_149`=$preg_29,`preg_150`=$preg_30,`preg_151`=$preg_31,`preg_152`=$preg_32,`preg_153`=$preg_33,`preg_154`=$preg_34,`preg_155`=$preg_35,`preg_156`=$preg_36,`preg_157`=$preg_37,`preg_158`=$preg_38,`preg_159`=$preg_39,`preg_160`=$preg_40,`bloque_4`=1 WHERE `id_estudiante` = $id_estudiante";        
        }
        if($paso == 5){
            $sql = "UPDATE `personalidad_respuestas` SET `preg_161`=$preg_1,`preg_162`=$preg_2,`preg_163`=$preg_3,`preg_164`=$preg_4,`preg_165`=$preg_5,`preg_166`=$preg_6,`preg_167`=$preg_7,`preg_168`=$preg_8,`preg_169`=$preg_9,`preg_170`=$preg_10,`preg_171`=$preg_11,`preg_172`=$preg_12,`preg_173`=$preg_13,`preg_174`=$preg_14,`preg_175`=$preg_15,`preg_176`=$preg_16,`preg_177`=$preg_17,`preg_178`=$preg_18,`preg_179`=$preg_19,`preg_180`=$preg_20,`preg_181`=$preg_21,`preg_182`=$preg_22,`preg_183`=$preg_23,`preg_184`=$preg_24,`preg_185`=$preg_25,`preg_186`=$preg_26,`preg_187`=$preg_27,`preg_188`=$preg_28,`preg_189`=$preg_29,`preg_190`=$preg_30,`preg_191`=$preg_31,`preg_192`=$preg_32,`preg_193`=$preg_33,`preg_194`=$preg_34,`preg_195`=$preg_35,`preg_196`=$preg_36,`preg_197`=$preg_37,`preg_198`=$preg_38,`preg_199`=$preg_39,`preg_200`=$preg_40,`bloque_5`=1 WHERE `id_estudiante` = $id_estudiante";
            
        }
        if($paso == 6){
            $sql = "UPDATE `personalidad_respuestas` SET `preg_201`=$preg_1,`preg_202`=$preg_2,`preg_203`=$preg_3,`preg_204`=$preg_4,`preg_205`=$preg_5,`preg_206`=$preg_6,`preg_207`=$preg_7,`preg_208`=$preg_8,`preg_209`=$preg_9,`preg_210`=$preg_10,`preg_211`=$preg_11,`preg_212`=$preg_12,`preg_213`=$preg_13,`preg_214`=$preg_14,`preg_215`=$preg_15,`preg_216`=$preg_16,`preg_217`=$preg_17,`preg_218`=$preg_18,`preg_219`=$preg_19,`preg_220`=$preg_20,`preg_221`=$preg_21,`preg_222`=$preg_22,`preg_223`=$preg_23,`preg_224`=$preg_24,`preg_225`=$preg_25,`preg_226`=$preg_26,`preg_227`=$preg_27,`preg_228`=$preg_28,`preg_229`=$preg_29,`preg_230`=$preg_30,`preg_231`=$preg_31,`preg_232`=$preg_32,`preg_233`=$preg_33,`preg_234`=$preg_34,`preg_235`=$preg_35,`preg_236`=$preg_36,`preg_237`=$preg_37,`preg_238`=$preg_38,`preg_239`=$preg_39,`preg_240`=$preg_40,`bloque_6`=1 WHERE `id_estudiante` = $id_estudiante";    
        }

        $update = DB::connection("mysql")
        ->select($sql);

       
        return response()->json([
            'mensaje' => "Respuesta Guardada Correctamente ",
            'success' => 1,
        ]);
    

    }

    public function calificar_personalidad(){

        $data = request()->all();

        $respuestas = DB::connection("mysql")
        ->table("personalidad_respuestas")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        //dim 1
        $Ansiedad = (4-$respuestas->preg_1)+$respuestas->preg_31+(4-$respuestas->preg_61)+$respuestas->preg_91+(4-$respuestas->preg_121)+$respuestas->preg_151+(4-$respuestas->preg_181)+$respuestas->preg_212;
        $Hostilidad = $respuestas->preg_6+(4-$respuestas->preg_36)+$respuestas->preg_66+(4-$respuestas->preg_96)+$respuestas->preg_126+(4-$respuestas->preg_156)+$respuestas->preg_186+$respuestas->preg_216;
        $Depresion = (4-$respuestas->preg_11)+$respuestas->preg_41+(4-$respuestas->preg_71)+$respuestas->preg_101+$respuestas->preg_131+$respuestas->preg_161+$respuestas->preg_191+$respuestas->preg_221;
        $Ansiedad_Social = $respuestas->preg_16+(4-$respuestas->preg_46)+$respuestas->preg_76+(4-$respuestas->preg_106)+$respuestas->preg_136+(4-$respuestas->preg_166)+$respuestas->preg_196+$respuestas->preg_226;
        $Impulsividad = (4-$respuestas->preg_21)+$respuestas->preg_51+(4-$respuestas->preg_81)+$respuestas->preg_111+(4-$respuestas->preg_141)+$respuestas->preg_171+$respuestas->preg_201+(4-$respuestas->preg_231);
        $Vulnerabilidad = $respuestas->preg_26+(4-$respuestas->preg_56)+$respuestas->preg_86+(4-$respuestas->preg_116)+$respuestas->preg_146+(4-$respuestas->preg_176)+(4-$respuestas->preg_206)+$respuestas->preg_236;
        $Neuroticismo = $Ansiedad+$Hostilidad+$Depresion+$Ansiedad_Social+$Impulsividad+$Vulnerabilidad;

        //dim 2
        $Cordialidad = $respuestas->preg_2+(4-$respuestas->preg_32)+$respuestas->preg_62+(4-$respuestas->preg_92)+$respuestas->preg_122+$respuestas->preg_152+$respuestas->preg_182+$respuestas->preg_212;
        $Gregarismo = (4-$respuestas->preg_7)+$respuestas->preg_37+(4-$respuestas->preg_67)+$respuestas->preg_97+(4-$respuestas->preg_127)+$respuestas->preg_157+(4-$respuestas->preg_187)+$respuestas->preg_217;
        $Asertividad = $respuestas->preg_12+(4-$respuestas->preg_42)+$respuestas->preg_72+(4-$respuestas->preg_102)+$respuestas->preg_132+(4-$respuestas->preg_162)+$respuestas->preg_192+(4-$respuestas->preg_222);
        $Actividad = (4-$respuestas->preg_17)+$respuestas->preg_47+(4-$respuestas->preg_77)+$respuestas->preg_107+(4-$respuestas->preg_137)+$respuestas->preg_167+$respuestas->preg_197+$respuestas->preg_227;
        $Busqueda_emociones = $respuestas->preg_22+(4-$respuestas->preg_52)+$respuestas->preg_82+(4-$respuestas->preg_112)+$respuestas->preg_142+$respuestas->preg_172+$respuestas->preg_202+$respuestas->preg_232;
        $Emociones_positivas = (4-$respuestas->preg_27)+$respuestas->preg_57+(4-$respuestas->preg_87)+$respuestas->preg_117+(4-$respuestas->preg_147)+$respuestas->preg_177+(4-$respuestas->preg_207)+$respuestas->preg_237;
        $Extraversion = $Cordialidad+$Gregarismo+$Asertividad+$Actividad+$Busqueda_emociones+$Emociones_positivas;

        //dim3
        $Fantasia = $respuestas->preg_3+(4-$respuestas->preg_33)+$respuestas->preg_63+(4-$respuestas->preg_93)+$respuestas->preg_123+(4-$respuestas->preg_153)+(4-$respuestas->preg_183)+(4-$respuestas->preg_213);
        $Estetica = (4-$respuestas->preg_8)+$respuestas->preg_38+(4-$respuestas->preg_68)+$respuestas->preg_98+(4-$respuestas->preg_128)+$respuestas->preg_158+$respuestas->preg_188+$respuestas->preg_218;
        $Sentimientos = $respuestas->preg_13+(4-$respuestas->preg_43)+$respuestas->preg_73+(4-$respuestas->preg_103)+$respuestas->preg_133+(4-$respuestas->preg_163)+$respuestas->preg_193+$respuestas->preg_223;
        $Acciones = (4-$respuestas->preg_18)+$respuestas->preg_48+(4-$respuestas->preg_78)+$respuestas->preg_108+(4-$respuestas->preg_138)+$respuestas->preg_168+(4-$respuestas->preg_198)+(4-$respuestas->preg_228);
        $Ideas = $respuestas->preg_23+(4-$respuestas->preg_53)+$respuestas->preg_83+(4-$respuestas->preg_113)+$respuestas->preg_143+(4-$respuestas->preg_173)+$respuestas->preg_203+$respuestas->preg_233;
        $Valores = (4-$respuestas->preg_28)+$respuestas->preg_58+(4-$respuestas->preg_88)+$respuestas->preg_118+(4-$respuestas->preg_148)+$respuestas->preg_178+(4-$respuestas->preg_208)+(4-$respuestas->preg_239);
        $Apertura = $Fantasia+$Estetica+$Sentimientos+$Acciones+$Ideas+$Valores;

        //dim 4
        $Confianza = (4-$respuestas->preg_4)+$respuestas->preg_34+(4-$respuestas->preg_64)+$respuestas->preg_94+(4-$respuestas->preg_124)+$respuestas->preg_154+$respuestas->preg_184+$respuestas->preg_214;
        $Franqueza = $respuestas->preg_9+(4-$respuestas->preg_39)+$respuestas->preg_69+(4-$respuestas->preg_99)+$respuestas->preg_129+(4-$respuestas->preg_159)+(4-$respuestas->preg_189)+(4-$respuestas->preg_219);
        $Altruismo = (4-$respuestas->preg_14)+$respuestas->preg_44+(4-$respuestas->preg_74)+$respuestas->preg_104+(4-$respuestas->preg_134)+$respuestas->preg_164+$respuestas->preg_194+$respuestas->preg_224;
        $A_Conciliadora = $respuestas->preg_19+(4-$respuestas->preg_49)+$respuestas->preg_79+(4-$respuestas->preg_109)+$respuestas->preg_139+(4-$respuestas->preg_169)+(4-$respuestas->preg_199)+(4-$respuestas->preg_229);
        $Modestia = $respuestas->preg_24+(4-$respuestas->preg_54)+$respuestas->preg_84+(4-$respuestas->preg_114)+$respuestas->preg_144+(4-$respuestas->preg_174)+$respuestas->preg_204+(4-$respuestas->preg_234);
        $Sensibilidad = $respuestas->preg_29+(4-$respuestas->preg_59)+$respuestas->preg_89+(4-$respuestas->preg_119)+$respuestas->preg_149+$respuestas->preg_179+$respuestas->preg_209+$respuestas->preg_239;
        $Amabilidad = $Confianza+$Franqueza+$Altruismo+$A_Conciliadora+$Modestia+$Sensibilidad;

        //dim 5
        $Competencia = $respuestas->preg_5+(4-$respuestas->preg_35)+$respuestas->preg_65+(4-$respuestas->preg_95)+$respuestas->preg_125+(4-$respuestas->preg_155)+$respuestas->preg_185+$respuestas->preg_215;
        $Orden = (4-$respuestas->preg_10)+$respuestas->preg_40+(4-$respuestas->preg_70)+$respuestas->preg_100+(4-$respuestas->preg_130)+$respuestas->preg_160+(4-$respuestas->preg_190)+(4-$respuestas->preg_220);
        $Deber = $respuestas->preg_15+(4-$respuestas->preg_45)+$respuestas->preg_75+(4-$respuestas->preg_105)+$respuestas->preg_135+$respuestas->preg_165+$respuestas->preg_195+$respuestas->preg_225;
        $Logro = (4-$respuestas->preg_20)+$respuestas->preg_50+(4-$respuestas->preg_80)+$respuestas->preg_110+(4-$respuestas->preg_140)+$respuestas->preg_170+$respuestas->preg_200+$respuestas->preg_230;
        $Autodisciplina = $respuestas->preg_25+(4-$respuestas->preg_55)+$respuestas->preg_85+(4-$respuestas->preg_115)+$respuestas->preg_145+(4-$respuestas->preg_175)+(4-$respuestas->preg_205)+$respuestas->preg_235;
        $Deliberacion = (4-$respuestas->preg_30)+$respuestas->preg_60+(4-$respuestas->preg_90)+$respuestas->preg_120+(4-$respuestas->preg_150)+$respuestas->preg_180+$respuestas->preg_210+$respuestas->preg_240;
        $Responsabilidad = $Competencia+$Orden+$Deber+$Logro+$Autodisciplina+$Deliberacion;

        
        $Negativismo = 0;
        $Aquiescencia = 0;

        $respuestas_a = array();

        foreach ($respuestas as $key) {
            $respuestas_a[] = $key;
        }

        for ($i=1; $i < 248; $i++) { 
            if($i != 41 && $i != 82  && $i != 123  && $i != 164  && $i != 205  && $i != 246){
                if($respuestas_a[$i] == 0 ||  $respuestas_a[$i] == 1){
                    $Negativismo = $Negativismo + 1;
                }
                if($respuestas_a[$i] == 3 ||  $respuestas_a[$i] == 4){
                    $Aquiescencia = $Aquiescencia + 1;
                }
            }
        }

        $insert_cal = DB::connection("mysql")
        ->table("personalidad_calificaciones")
        ->insert([
            'id_estudiante' => $data["id"],
            'Ansiedad' => $Ansiedad,
            'Hostilidad'=> $Hostilidad,
            'Depresion'=> $Depresion,
            'Ansiedad_Social'=> $Ansiedad_Social,
            'Impulsividad'=> $Impulsividad,
            'Vulnerabilidad'=> $Vulnerabilidad,
            'Neuroticismo'=> $Neuroticismo,
            'Cordialidad'=> $Cordialidad,
            'Gregarismo'=> $Gregarismo,
            'Asertividad'=> $Asertividad,
            'Actividad' => $Actividad,
            'Busqueda_emociones' => $Busqueda_emociones,
            'Emociones_positivas'=> $Emociones_positivas,
            'Extraversion'=> $Extraversion,
            'Fantasia'=> $Fantasia,
            'Estetica'=> $Estetica,
            'Sentimientos'=> $Sentimientos,
            'Acciones'=> $Acciones,
            'Ideas'=> $Ideas,
            'Valores'=> $Valores,
            'Apertura'=> $Apertura,
            'Confianza' => $Confianza,
            'Franqueza'=> $Franqueza,
            'Altruismo'=> $Altruismo,
            'A_Conciliadora'=> $A_Conciliadora,
            'Modestia'=> $Modestia,
            'Sensibilidad'=> $Sensibilidad,
            'Amabilidad'=> $Amabilidad,
            'Competencia'=> $Competencia,
            'Orden'=> $Orden,
            'Deber'=> $Deber,
            'Logro'=> $Logro,
            'Autodisciplina'=> $Autodisciplina,
            'Deliberacion'=> $Deliberacion,
            'Responsabilidad'=> $Responsabilidad,
            'Negativismo'=> $Negativismo,
            'Aquiescencia'=> $Aquiescencia,
        ]);

        if($insert_cal){     
            DB::connection("mysql")
            ->table("personalidad_respuestas")
            ->where("id_estudiante", $data["id"])
            ->update([
                'estado_calificado' => 1,
            ]);
            
            return response()->json([
                'respuesta' => "Test Calificado Correctamente!",
                'codigo' => 1,
            ]);

        }else{
            return response()->json([
                'respuesta' => "Ocurrio un error, intente mas tarde.",
                'codigo' => 0,
            ]);
        }
    }

    public function detalle_personalidad(){

        $data = request()->all();

        $detalle = DB::connection("mysql")
        ->table("personalidad_calificaciones")
        ->where("id_estudiante", $data["id"])
        ->select("*")
        ->first();

        return response()->json([
            'detalle' => $detalle,
        ]);
    }

    public function listar_estudiantes_personalidad(){

        $data = request()->all();

        $listaep = DB::connection("mysql")
        ->table("personalidad_calificaciones")
        ->join("estudiante","estudiante.id","personalidad_calificaciones.id_estudiante")
        ->select("personalidad_calificaciones.*", "estudiante.*")
        ->get();

        return response()->json([
            'listaep' => $listaep,
        ]);
    }
}
