<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;

class EspecieController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = Especie::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $especie = Especie::where('especie','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('Especie.index', ['especie' => $especie, 'search' => $query, 'id'=>$id]);
        }
    }

   
    public function create()
    {
        return view('especie.create');
    }

    
    public function store(Request $request)
    {
         $tabla = new Especie();
        $tabla->especie = $request->input('especie');  

        $tabla->save();
        
        return redirect('especies');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        return view('especie.edit', ['especie'=> Especie::findOrFail($id)]) ;  
    }

    
    public function update(Request $request, $id)
    {
         $especie = Especie::findOrFail($id);

        $especie->especie = $request->get('especie');  

     $especie->update();

     return redirect('especies');
    }

    
    public function destroy($id)
    {
        $especie = Especie::FindOrFail($id);

        $especie->delete();

        return redirect('especies');
    }
}
