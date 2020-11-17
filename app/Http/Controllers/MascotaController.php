<?php

namespace App\Http\Controllers;

use App\Mascota;
use App\User;
use App\Especie;
use App\Raza;
use App\Sexo;
use Illuminate\Http\Request;
use App\Http\Requests\MascotaFormRequest;

class MascotaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $id = Mascota::all();
       $query = trim($request->get('search'));
        if ($request) 
        {
            $mascota = Mascota::where('nombre','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('mascota.index', ['mascota' => $mascota, 'search' => $query, 'id'=>$id]);
        }
    }

    

    public function create()
    {
        $data = User::all();
        $dataEs = Especie::all();
        $dataRa = Raza::all();
        $dataSe = Sexo::all();
        return view('mascota.create',['data'=>$data, 'dataEs'=>$dataEs, 'dataRa'=>$dataRa, 'dataSe'=>$dataSe]);
    }

    

    public function store(Request $request)
    {
        
        $tabla = new Mascota();
        $tabla->nombre = $request->input('nombre');  
        $tabla->fechaNac = $request->input('fechaNac');
        $tabla->id_cliente = $request->input('id_cliente');
        $tabla->id_especie = $request->input('id_especie');
        $tabla->id_raza = $request->input('id_raza');
        $tabla->id_sexo = $request->input('id_sexo');

        $tabla->save();
        
        return redirect('mascotas');
    }   

    

    public function show($id)
    {

        return view('mascota.show', ['mascota'=> Mascota::findOrFail($id)]) ; 
    }

    

    public function edit($id)
    {   
        

        
        $data = User::all();
        $dataEs = Especie::all();
        $dataRa = Raza::all();
        $dataSe = Sexo::all();


        return view('mascota.edit', ['mascota'=> Mascota::findOrFail($id), 'data'=>$data,'dataEs'=>$dataEs, 'dataRa'=>$dataRa, 'dataSe'=>$dataSe]) ;  
    }

    

    public function update(MascotaFormRequest $request, $id)
    {
        $mascota = Mascota::findOrFail($id);

        $mascota->nombre = $request->get('nombre');  
        $mascota->fechaNac = $request->get('fechaNac');
        $mascota->id_cliente = $request->input('id_cliente');
        $mascota->id_especie = $request->input('id_especie');
        $mascota->id_raza = $request->input('id_raza');
        $mascota->id_sexo = $request->input('id_sexo');

     $mascota->update();

     return redirect('mascotas');
    }

    

    public function destroy($id)
    {
        $mascota = Mascota::FindOrFail($id);

        $mascota->delete();

        return redirect('mascotas');
    }
}
