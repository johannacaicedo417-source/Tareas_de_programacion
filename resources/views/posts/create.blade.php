@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Crear Nuevo Post</h1>
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 max-w-2xl">
        <form action="{{ route('posts.store') }}" method="POST">
            @include('posts._form')
            
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-lg transition">
                    Guardar Post
                </button>
            </div>
        </form>
    </div>
@endsection

