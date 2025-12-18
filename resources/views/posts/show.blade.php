@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
            <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
        </div>
        <a href="{{ route('posts.edit', $post) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded shadow">
            Editar
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-lg overflow-hidden p-8 max-w-4xl">
        <div class="mb-4">
            @if($post->published)
                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase">Público</span>
            @else
                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase">Borrador</span>
            @endif
            <span class="text-gray-500 text-sm ml-2">Creado el {{ $post->created_at->format('d/m/Y H:i') }}</span>
        </div>

        <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
            {!! nl2br(e($post->body)) !!}
        </div>
    </div>
@endsection

