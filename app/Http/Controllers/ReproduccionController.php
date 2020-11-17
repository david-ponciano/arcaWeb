<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;


class ReproduccionController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
       $id = Estado::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $estado = Estado::where('estado','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('estado.index', ['estado' => $estado, 'search' => $query, 'id'=>$id]);
        }
    }

    
    public function create()
    {
        return view('estado.create');
    }

    

    public function store(Request $request)
    {
        $tabla = new Estado();
        $tabla->estado = $request->input('estado');  

        $tabla->save();
        
        return redirect('estados');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         return view('estado.edit', ['estado'=> Estado::findOrFail($id)]) ;  
    }

    
    public function update(Request $request, $id)
    {
         $estado = Estado::findOrFail($id);

         $estado->estado = $request->get('estado');  

         $estado->update();

     return redirect('estados');
    }

    
    public function destroy($id)
    {
         $estado = Estado::FindOrFail($id);

        $estado->delete();

        return redirect('estados');
    }
}
