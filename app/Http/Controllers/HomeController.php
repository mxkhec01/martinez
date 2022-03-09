<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;

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
        /*query para el dashboard */

        $viajesEstatus = Viaje::selectRaw('estado, count(1) AS numero')
        ->groupBy('estado')
        ->get();

        dd($viajesEstatus);
        return view('home', compact('viajesEstatus'));
    }
}
