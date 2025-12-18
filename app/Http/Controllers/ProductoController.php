<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nombre_producto', 'like', '%' . $search . '%')
                  ->orWhere('descripcion_producto', 'like', '%' . $search . '%');
        }

        $productos = $query->latest()->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('productos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'fecha_producto' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $categories = Category::all();
        return view('productos.edit', compact('producto', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required',
            'fecha_producto' => 'required|date',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
