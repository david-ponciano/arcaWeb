<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Mascota;
use App\Especie;
use App\Raza;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_users = User::count();
        $count_roles = Role::count();
        $count_mascotas = Mascota::count();
        $count_especies = Especie::count();
        $count_razas = Raza::count();
        return view('home', compact('count_users', 'count_roles','count_mascotas','count_especies','count_razas'));
    }
}
