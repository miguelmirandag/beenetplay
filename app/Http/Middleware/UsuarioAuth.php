<?php

namespace App\Http\Middleware;

use Closure;

class UsuarioAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Recupera cookie llamada status
        $status = $request->cookie('status');
        
        //Validando parametro de respuesta de API/login Cinemarex
        if ($status == 200) {
            //continua a la URL solicitada
            return $next($request);    
        }

        //Error que se agrega a Sweetalert para mostrar
        alert()->error('Debes Iniciar Sesion', 'Error');
        //Redirecciona a Login
        return redirect('/');
    }
}
