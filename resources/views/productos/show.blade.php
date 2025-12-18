@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Detalles del Producto</h2>
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-bold mb-1">Nombre:</label>
                <p class="text-gray-900 text-lg">{{ $producto->nombre_producto }}</p>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-bold mb-1">Categoría:</label>
                <p class="text-gray-900 text-lg">
                    <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $producto->category ? $producto->category->name : 'Sin Categoría' }}</span>
                </p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-bold mb-1">Descripción:</label>
                <p class="text-gray-700">{{ $producto->descripcion_producto }}</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-600 text-sm font-bold mb-1">Fecha de Ingreso:</label>
                <p class="text-gray-900">{{ $producto->fecha_producto->format('d/m/Y') }}</p>
            </div>
            
            <div class="flex items-center justify-between">
                <a href="{{ route('productos.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    Volver
                </a>
                <a href="{{ route('productos.edit', $producto->id) }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
            </div>
        </div>
    </div>
@endsection
