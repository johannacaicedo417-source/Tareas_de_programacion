<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Mostrar listado de usuarios.
     */
    public function index()
    {
        $users = User::paginate(10); // Paginación de 10 en 10
        return view('users.index', compact('users'));
    }

    // Aquí se podrían añadir métodos para editar/eliminar usuarios en el futuro
}
