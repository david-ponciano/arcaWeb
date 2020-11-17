<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

class ServicioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = Servicio::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $servicio = Servicio::where('servicio','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('Servicio.index', ['servicio' => $servicio, 'search' => $query, 'id'=>$id]);
        }
    }

    
    public function create()
    {
        return view('servicio.create');
    }

    
    public function store(Request $request)
    {
        $tabla = new Servicio();
        $tabla->servicio = $request->input('servicio');  

        $tabla->save();
        
        return redirect('servicios');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        return view('servicio.edit', ['servicio'=> Servicio::findOrFail($id)]) ;  
    }

    
    public function update(Request $request, $id)
    {
         $servicio = Servicio::findOrFail($id);

         $servicio->servicio = $request->get('servicio');  

         $servicio->update();

     return redirect('servicios');
    }

    
    public function destroy($id)
    {
        $servicio = Servicio::FindOrFail($id);

        $servicio->delete();

        return redirect('servicios');
    }
}
