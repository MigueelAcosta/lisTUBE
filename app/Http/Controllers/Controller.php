<?php

namespace lisTUBE\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validarxml(){
        libxml_disable_entity_loader(false);
         $file = $_POST['xml'];
         $xml = new \DOMDocument();
         $xml->load($file);
         if (!$xml->schemaValidate(asset('xml/validar.xsd'))){
             return \DOMDocument::schemaValidate();
         }else{
             return 'funciona';
         }
    }

}
