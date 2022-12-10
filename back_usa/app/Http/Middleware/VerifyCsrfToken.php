<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/login',
        '/enviar-correo',
        '/registro-usuario',
        '/recuperar-password',
        '/asignar-permiso',
        '/registrar-convenio',
        '/editar-convenio',
        '/registrar-tutor-usa',
        '/editar-tutor-usa'
    ];
}
