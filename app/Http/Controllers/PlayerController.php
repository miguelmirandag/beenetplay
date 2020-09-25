<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PlayerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        //Conectar a API
        $client = new Client([
            'base_uri' => 'http://play.instel.site/',
            'timeout'  => 6.0,
        ]);
        
        //Traer categorias y sus canales desde la API
        $response = $client->request('GET', 'api/v1/ghost/get/tv');
                
        //extrayendo informacion del response 
        $categorias = json_decode($response->getBody()->getContents())->data->channels;         
        
        //enviando variable a vista para mostrar en player
        return view('player.playerView',compact('categorias'));
    
    }
}
