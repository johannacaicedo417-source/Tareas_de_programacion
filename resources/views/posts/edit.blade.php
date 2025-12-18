@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Editar Post</h1>
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 max-w-2xl">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @method('PUT')
            @include('posts._form')
            
            <div class="mt-6">
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded shadow-lg transition">
                    Actualizar Post
                </button>
            </div>
        </form>
    </div>
@endsection

