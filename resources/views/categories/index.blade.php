@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Lista de Categorías</h1>
        <a href="{{ route('categories.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
            + Nueva
        </a>
    </div>

    <div class="bg-orange-50 shadow-md rounded my-6 overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Nombre</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Descripción</button>
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-orange-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <button class="bg-pink-200 hover:bg-pink-300 text-black font-bold py-1 px-3 rounded w-full text-left">Acciones</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap font-semibold">{{ $category->name }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">{{ $category->description }}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-orange-50 text-sm">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-flex">
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-purple-300 hover:bg-purple-400 text-black font-bold py-1 px-3 rounded mr-2">Editar</a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-black font-bold py-1 px-3 rounded" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-orange-50 border-t flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
