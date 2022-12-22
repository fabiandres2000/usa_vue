import { http } from "./http_services";

export function registrar_practica($data) {
    return http().post(
        '/registrar-practica', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function verificar_asignacion($id) {
    return http().get('/verificar-asignacion?id='+$id);
}

export function verificar_registro($id) {
    return http().get('/verificar-registro?id='+$id);
}

export function editar_practica($data) {
    return http().post(
        '/editar-practica', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function guardar_socio($data) {
    return http().post(
        '/guardar-sociodemografico', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function consultar_estudiante($id) {
    return http().get('/consultar-estudiante?id='+$id);
}

export function consultar_socio($id) {
    return http().get('/consultar-socio?id='+$id);
}

export function verificar_paso_personalidad($id) {
    return http().get('/verificar-paso-personalidad?id='+$id);
}

export function guardar_respuesta_personalidad($data) {
    return http().post(
        '/guardar-respuesta-personalidad', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function calificar_personalidad($id) {
    return http().get('/calificar-personalidad?id='+$id);
}