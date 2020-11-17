<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historial;
use App\User;
use App\Mascota;
use App\Servicio;
use App\Estado;

class HistorialController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $id = Historial::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $historial = Historial::where('id_mascota','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('historial.index', ['historial' => $historial, 'search' => $query, 'id'=>$id]);
        }
    }

    
    public function create()
    {
        $data = User::all();
        $dataMas = Mascota::all();
        $dataSer = Servicio::all();
        $dataEs = Estado::all();
        return view('historial.create',['data'=>$data, 'dataMas'=>$dataMas, 'dataSer'=>$dataSer, 'dataEs'=>$dataEs]);
    }

    
    public function store(Request $request)
    {
        
        $tabla = new Historial(); 
        $tabla->id_cliente = $request->input('id_cliente');
        $tabla->id_mascota = $request->input('id_mascota');
        $tabla->id_servicio = $request->input('id_servicio');
        $tabla->id_estado = $request->input('id_estado');
        $tabla->fechaSer = $request->input('fechaSer');
        $tabla->motivo = $request->input('motivo');
        $tabla->problema = $request->input('problema');
        $tabla->diagnostico = $request->input('diagnostico');

        $tabla->save();
        
        return redirect('historiales');
    }

    
    public function show($id)
    {
         return view('historial.show', ['historial'=> Historial::findOrFail($id)]) ;
    }

    
    public function edit($id)
    {
        
        $data = User::all();
        $dataMas = Mascota::all();
        $dataSer = Servicio::all();
        $dataEs = Estado::all();

        return view('historial.edit', ['historial'=> Historial::findOrFail($id), 'data'=>$data,'dataMas'=>$dataMas, 'dataSer'=>$dataSer, 'dataEs'=>$dataEs]) ;  
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $historial = Historial::FindOrFail($id);

        $historial->delete();

        return redirect('historiales');
    }
}
