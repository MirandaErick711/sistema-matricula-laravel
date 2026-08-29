<?php
 
namespace App\Http\Controllers;
 
use App\Models\Persona;
use Illuminate\Http\Request;
 
class PersonaController extends Controller
{
    public function create()
    {
        return view('personas.create');
    }
 
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:30'],
        ]);
 
        $persona = Persona::create($datos);
 
        return view('personas.confirmacion', compact('persona'));
    }
}