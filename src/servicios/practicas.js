import { http } from "./http_services";

////////////////////convenios
export function listar_convenios() {
    return http().get('/convenios');
}

export function registrar_convenio($data) {
    return http().post(
        '/registrar-convenio', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function editar_convenio($data) {
    return http().post(
        '/editar-convenio', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function eliminar_convenio($id) {
    return http().get('/eliminar-convenio?id='+$id);
}



/////////////// tutores usa
export function listar_tutores_usa() {
    return http().get('/tutores-usa');
}

export function registrar_tutor_usa($data) {
    return http().post(
        '/registrar-tutor-usa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function editar_tutor_usa($data) {
    return http().post(
        '/editar-tutor-usa', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function eliminar_tutuor_usa($id) {
    return http().get('/cambiar-estado-tutor-usa?id='+$id);
}


//////////////////// ti¡utores sp
export function listar_tutores_sp() {
    return http().get('/tutores-sp');
}

export function registrar_tutor_sp($data) {
    return http().post('/registrar-tutor-sp', $data);
}

export function editar_tutor_sp($data) {
    return http().post('/editar-tutor-sp', $data);
}

export function cambiar_estado_tutor_sp($id) {
    return http().get('/cambiar-estado-tutor-sp?id='+$id);
}


/////////////////// asignaciones
export function listar_estudiantes_no_asignados() {
    return http().get('/estudiantes-no-asignados');
}

export function listar_convenios_vigentes() {
    return http().get('/convenios-vigentes');
}

export function tutores_sp_por_convenio($id) {
    return http().get('/tutores-por-convenio?id='+$id);
}

export function asignar_practicas($data) {
    return http().post(
        '/asignar-practica', 
        $data, 
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    );
}

export function listar_asignaciones() {
    return http().get('/listar-asignaciones');
}

export function eliminar_asignacion($id, $id_estudiante) {
    return http().get('/eliminar-asignacion?id='+$id+'&id_estudiante='+$id_estudiante);
}