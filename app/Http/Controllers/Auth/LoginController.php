<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cookie;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use DateTime;

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
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $fecha = new DateTime();
        $secret_key = '1234567890123456';
        $data = "username=".request()->username.";password=".request()->password.";appid=1;boxid=123456789;timestamp=".$fecha->getTimestamp();
        
        //dd($data);
        //$encrypted = encrypt($data,$secret_key);
        $decrypted = decrypt('eyJpdiI6IlJwa3o1QmVhTU9yWkdIK3BmOURhWXc9PSIsInZhbHVlIjoieXJ2UVV5WEJkNlU0bk1MZnBFMTlpKytvbCt6VlduZGFzNHJ6NGFNemduUWNQUW1pbmRFRzZvTUxmYWRkTmZIc3cwTFpONWhoSTU1QWI4WE4zTjVnWW5wU0FwanU3M0ZiUGRNRWZqS2wwREs0TTZhb29VOFY0YlVqMVlCZTZNOU0iLCJtYWMiOiI3NDRlNmIyYjE5ZjViMDg4ZWI2Y2Y5MWU5OWFjMmFhOTdlMTFmZjk1MjI0MzFhOWMxM2FiMmU4Y2JkNmU2YzVkIn0=',$secret_key);
        dd($decrypted);

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

    public function encrypt($data,$encryption_key){
        
        $key = hex2bin($encryption_key);
        $nonceSize = openssl_cipher_iv_length('aes-128-cbc');
        $nonce = openssl_random_pseudo_bytes($nonceSize);

        $ciphertext = openssl_encrypt(
            $data,
            'aes-128-cbc',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return base64_encode($nonce.$ciphertext);

    }

    public function decrypt($data,$encryption_key){
        $key = hex2bin($encryption_key);
        $data = base64_decode($data);
        $nonceSize = openssl_cipher_iv_length('aes-128-cbc');
        $nonce = mb_substr($data, 0, $nonceSize, '8bit');
        $ciphertext = mb_substr($data,$nonceSize,null,'8bit');

        $plaintext = openssl_decrypt(
            $ciphertext,
            'aes-128-cbc',
            $key,
            OPENSSL_RAW_DATA,
            $nonce
        );

        return $plaintext;
    }
}
