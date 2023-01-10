import { http } from "./http_services";

export function asignar_permiso($data) {
    return http().post('/asignar-permiso', $data);
}

export function lista_ep() {
    return http().get('/listar-estudiantes-personalidad');
}
