<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipulo;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aniversariantes = Discipulo::MonthBirthdays()->paginate(8);
        $discipulos = Discipulo::get();
        $last_discipulos = Discipulo::orderBy('created_at', 'DES', SORT_REGULAR, true)->paginate(5);
        return view('home', compact('discipulos', 'aniversariantes', 'last_discipulos'));
    }
}
