@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Lista de Productos</h1>
        <div class="flex space-x-2">
            <form action="{{ route('productos.index') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Buscar producto..." class="border rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-600" value="{{ request('search') }}">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-r">
                    Buscar
                </button>
            </form>
            <a href="{{ route('productos.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                + Nuevo
            </a>
        </div>
    </div>

    <div class="bg-orange-50 shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Nombre</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Categoría</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Descripción</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Fecha</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Acciones</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $producto->nombre_producto }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                            <span class="relative">{{ $producto->category ? $producto->category->name : 'Sin Categoría' }}</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ Str::limit($producto->descripcion_producto, 50) }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $producto->fecha_producto->format('d/m/Y') }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline-flex">
                            <a href="{{ route('productos.show', $producto->id) }}" class="bg-blue-600 hover:bg-blue-700 text-black font-bold py-1 px-3 rounded mr-2">Ver</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="bg-purple-300 hover:bg-purple-400 text-black font-bold py-1 px-3 rounded mr-2">Editar</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-black font-bold py-1 px-3 rounded" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-orange-50 border-t flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $productos->links() }}
        </div>
    </div>
@endsection
