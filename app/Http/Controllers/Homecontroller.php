<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Página principal del sitio
    public function index()
    {
        return view('home');
    }
}
