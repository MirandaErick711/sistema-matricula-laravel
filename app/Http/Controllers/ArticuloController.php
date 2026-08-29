<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class ArticuloController extends Controller
{
    
    public function show($id){
        $articulos = array('Primero', 'Segundo','Tercero', 'Último');
        return view('articulos',[
                            'nombre' => 'Ane Aranceta',
                            'articulos' => $articulos
                            ]);
    }
}
 