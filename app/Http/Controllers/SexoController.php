<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sexo;

class SexoController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
    {
        $id = Sexo::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $sexo = Sexo::where('sexo','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('Sexo.index', ['sexo' => $sexo, 'search' => $query, 'id'=>$id]);
        }
    }
    
    public function create()
    {
        return view('sexo.create');
    }

    
    public function store(Request $request)
    {
        $tabla = new Sexo();
        $tabla->sexo = $request->input('sexo');  

        $tabla->save();
        
        return redirect('sexos');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        return view('sexo.edit', ['sexo'=> Sexo::findOrFail($id)]) ;  
    }

    
    public function update(Request $request, $id)
    {
         $sexo = Sexo::findOrFail($id);

        $sexo->sexo = $request->get('sexo');  

     $sexo->update();

     return redirect('sexos');
    }

    
    public function destroy($id)
    {
         $sexo = Sexo::FindOrFail($id);

        $sexo->delete();

        return redirect('sexos');
    }
}
