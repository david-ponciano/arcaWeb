<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $query = trim($request->get('search'));
        if ($request) 
        {
            $users = User::where('name','LIKE','%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(5);

                return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }

        //$users = User::all();
        //return view('usuarios.index', ['users' => $users]);
    }

    
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.create', ['roles'=>$roles]);
    }

    
    public function store(Request $request)
    {
     $usuario = new User();

     $usuario->name = $request->input('name');  
     $usuario->email = $request->input('email');
     $usuario->password = bcrypt($request->input('password'));

     $usuario->save();

     $usuario->asignarRol($request->get('rol'));

     return redirect('/usuarios');
    }

    
    public function show($id)
    {
    return view('usuarios.show', ['user'=> User::findOrFail($id)]) ;  
    }

    
    public function edit($id)
    {
     return view('usuarios.edit', ['user'=> User::findOrFail($id)]) ;  
    }

    
    public function update(UserFormRequest $request, $id)
    {
        $usuario = User::findOrFail($id);

     $usuario->name = $request->get('name');  
     $usuario->email = $request->get('email');

     $usuario->update();

     return redirect('/usuarios');
    }

    
    public function destroy($id)
    {
        $usuario = User::FindOrFail($id);

        $usuario->delete();

        return redirect('usuarios');
    }
}
