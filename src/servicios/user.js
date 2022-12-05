import { http } from "./http_services";

export function listar() {
    return http().get('/listar');
}

export function login($data) {
    return http().post('/login', $data);
}