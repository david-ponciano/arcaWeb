<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Raza;
use App\Especie;

class RazaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = Raza::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $raza = Raza::where('raza','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('raza.index', ['raza' => $raza, 'search' => $query, 'id'=>$id]);
        }
    }
   
    public function create()
    {
        return view('raza.create');
    }

    
    public function store(Request $request)
    {
        $tabla = new Raza();
        $tabla->raza = $request->input('raza');  

        $tabla->save();
        
        return redirect('razas');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        return view('raza.edit', ['raza'=> Especie::findOrFail($id)]) ;  
    }

    
    public function update(Request $request, $id)
    {
         $raza = Raza::findOrFail($id);

        $raza->raza = $request->get('raza');  

     $raza->update();

     return redirect('razas');
    }

   
    public function destroy($id)
    {
        $raza = Raza::FindOrFail($id);

        $raza->delete();

        return redirect('razas');
    }
}
