<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Mostrar la página de inicio del sitio.
     */
    public function index()
    {
        return view('home.index');
    }
}
