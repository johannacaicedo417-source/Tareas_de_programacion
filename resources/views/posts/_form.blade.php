@csrf

<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}" 
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-3 border" 
            placeholder="Ingrese el título del post" required>
        @error('title')<p class="mt-1 text-sm text-red-600 font-semibold">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
        <textarea name="body" id="body" rows="8" 
            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-3 border" 
            placeholder="Escriba el contenido aquí...">{{ old('body', $post->body ?? '') }}</textarea>
        @error('body')<p class="mt-1 text-sm text-red-600 font-semibold">{{ $message }}</p>@enderror
    </div>

    <div class="flex items-center">
        <input type="checkbox" name="published" id="published" value="1" {{ old('published', $post->published ?? false) ? 'checked' : '' }}
            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <label for="published" class="ml-2 block text-sm text-gray-900 font-medium">
            Publicar inmediatamente
        </label>
    </div>
</div>

