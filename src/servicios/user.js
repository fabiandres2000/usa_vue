import { http } from "./http_services";

export function listar() {
    return http().get('/listar');
}

export function login($data) {
    return http().post('/login', $data);
}

export function registro_usuario($data) {
    return http().post('/registro-usuario', $data);
}

export function recuperar_clave($data) {
    return http().post('/recuperar-password', $data);
}