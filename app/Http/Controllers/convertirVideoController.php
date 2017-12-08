<?php
/**
 * Created by PhpStorm.
 * User: Miguel Acosta
 * Date: 03/11/2017
 * Time: 02:17 PM
 */

namespace lisTUBE\Http\Controllers;

use Illuminate\http\Request;


class convertirVideoController extends Controller
{
    public function saludo(){
        return "prueba de la funcion";
    }

    public function subirVideo(){
        return "hola";
    }

    public function videoPost(Request $request){
        print_r($request);
    }
}