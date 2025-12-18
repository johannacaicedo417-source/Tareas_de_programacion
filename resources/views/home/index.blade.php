<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventarioApp - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navegación Principal -->
    <nav class="flex items-center justify-between flex-wrap bg-white shadow-md p-6 sticky top-0 z-50">
        <div class="flex items-center flex-shrink-0 text-sky-600 mr-6">
            <span class="font-bold text-2xl tracking-tight">InventarioApp</span>
        </div>
        
        <!-- Menú Hamburguesa (Mobile) -->
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-400 hover:text-sky-600 hover:border-sky-600">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>

        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <!-- Enlaces públicos si los hubiera -->
            </div>
            <div>
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-sky-600 border-sky-600 hover:border-transparent hover:text-white hover:bg-sky-600 mt-4 lg:mt-0 font-semibold transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-sky-600 border-sky-600 hover:border-transparent hover:text-white hover:bg-sky-600 mt-4 lg:mt-0 font-semibold transition">Iniciar Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-sky-600 bg-sky-600 hover:bg-sky-700 mt-4 lg:mt-0 font-semibold transition">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4">
            Gestión Inteligente de <span class="text-sky-600">Inventario</span>
        </h1>
        <p class="text-xl text-gray-600 mb-8">
            Administra tus productos y categorías de manera eficiente y sencilla.
        </p>
        
        @auth
            <p class="text-green-600 font-semibold mb-6">¡Hola, {{ Auth::user()->name }}!</p>
        @endauth

        <!-- Botones de Módulos (Accesos Directos) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-4xl mx-auto mt-12">
            
            <!-- Card Productos -->
            <a href="{{ route('productos.index') }}" class="group block bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 overflow-hidden border-t-4 border-red-500">
                <div class="p-8">
                    <div class="mb-4 text-red-500 group-hover:scale-110 transition duration-300">
                        <!-- Icono Box -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-red-600 mb-2">Productos</h3>
                    <p class="text-gray-600">Administra el catálogo completo, precios y stock.</p>
                </div>
            </a>

            <!-- Card Categorías -->
            <a href="{{ route('categories.index') }}" class="group block bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 overflow-hidden border-t-4 border-green-500">
                <div class="p-8">
                    <div class="mb-4 text-green-500 group-hover:scale-110 transition duration-300">
                        <!-- Icono Tag -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 group-hover:text-green-600 mb-2">Categorías</h3>
                    <p class="text-gray-600">Organiza tus productos en familias y tipos.</p>
                </div>
            </a>

        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} InventarioApp. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
