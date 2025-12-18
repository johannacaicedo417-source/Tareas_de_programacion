@extends('layouts.admin')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Resumen General</h1>
    </div>

    <!-- Cards Informativas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Card Productos -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-red-500 flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Total Productos</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalProductos ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Categorías -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-green-500 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Categorías</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalCategorias ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Usuarios -->
        <div class="bg-white rounded-lg shadow-lg p-6 border-l-4 border-blue-500 flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500">Usuarios</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalUsuarios ?? 0 }}</p>
            </div>
        </div>

        <!-- Card Bienvenida (Hora) -->
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg shadow-lg p-6 text-white flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase opacity-75">Estado del Sistema</p>
                <p class="text-lg font-bold">En Línea</p>
            </div>
            <div class="text-3xl">
                🚀
            </div>
        </div>
    </div>

    <!-- Tabla rápida de últimos productos -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Últimos Productos Agregados</h3>
            <a href="{{ route('productos.index') }}" class="text-blue-600 hover:underline text-sm font-semibold">Ver todos</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($ultimosProductos as $producto)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $producto->nombre_producto }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ $producto->category->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $producto->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center italic">No hay productos recientes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
