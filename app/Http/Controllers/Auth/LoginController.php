<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cookie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        /**
         * Solo se accede a showloginForm, si es invitado no autenticado
         * la redireccion se realiza en Middleware/RedirectIfAuthenticate
         */
        //$this->middleware('guest',['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        
        //Validacion de campos de Form Login 
        $credenciales = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        //Llamado a API       
        $client = new Client([
            'base_uri' => 'http://play.instel.site/',
            'timeout'  => 20,
        ]);

        try {
            
            $response = $client->request('POST', 'oauth/token', [
                'json' => [
                        'grant_type' => "password",
                        'client_id' => "2",
                        'client_secret' => "OUvUQ3am8MP8GR1pPXLi6buf8rcbG8u1GynIpRMO",
                        'username' => request()->email,
                        'password' => request()->password,
                        'scope' => ""         
                    ]
            ]);
        } catch (ClientException $e) {

            //Retorna a la pagina de login con mensaje
            alert()->error('Usuario y/o password no existen', 'Credenciales Invalidas');
            return back();

        } 
        
        alert()->success('Has Iniciado Sesion', 'Bienvenido');

        //Redirige a ruta "player" y crea una cookie 'status' que guarda la respuesta de API
        return redirect()->route('player')->cookie('status',$response->getStatusCode(), 60);
        
    }

    public function logout()
    {
        
        $client = new Client([
            'base_uri' => 'http://play.instel.site/',
            'timeout'  => 6.0,
        ]);
    
        $response = $client->request('GET', 'api/v1/get/logout');
                

        //Elimina la cookie
        Cookie::queue(Cookie::forget('status'));

        alert()->info('Sesion Cerrada Exitosamente', 'Sesion Terminada');
        //Redirige a Login
        return redirect('/');
    }
}
