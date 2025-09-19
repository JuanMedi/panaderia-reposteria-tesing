<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Productos de panadería (categoria_id = 1)
        $productosPanaderia = Producto::where('categoria_id', 1)->get();

        return view('home', compact('productosPanaderia'));
    }

}
