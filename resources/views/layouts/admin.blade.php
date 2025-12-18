<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0 hidden md:flex flex-col">
            <div class="p-4 flex items-center justify-center h-16 bg-gray-900 border-b border-gray-700">
                <span class="font-bold text-xl tracking-wider uppercase">Inventario</span>
            </div>
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-gray-700 border-l-4 border-sky-500' : 'hover:bg-gray-700' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                    </li>
                    <!-- Productos -->
                    <li>
                        <a href="{{ route('productos.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('productos.*') ? 'bg-gray-700 border-l-4 border-red-500' : 'hover:bg-gray-700' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            Productos
                        </a>
                    </li>
                    <!-- Categorías -->
                    <li>
                        <a href="{{ route('categories.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('categories.*') ? 'bg-gray-700 border-l-4 border-green-500' : 'hover:bg-gray-700' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            Categorías
                        </a>
                    </li>
                    <!-- Posts -->
                    <li>
                        <a href="{{ route('posts.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('posts.*') ? 'bg-gray-700 border-l-4 border-yellow-500' : 'hover:bg-gray-700' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12h10"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16h10"></path></svg>
                            Posts
                        </a>
                    </li>
                    <!-- Usuarios -->
                    <li>
                        <a href="{{ route('users.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('users.*') ? 'bg-gray-700 border-l-4 border-blue-500' : 'hover:bg-gray-700' }} transition">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Usuarios
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 bg-gray-900 border-t border-gray-700">
                <div class="flex items-center">
                   <div class="text-sm">
                        <p class="text-white font-bold leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-gray-400 text-xs mt-1">{{ Auth::user()->email }}</p>
                   </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-2 px-4 rounded transition">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Mobile Header -->
            <header class="flex justify-between items-center p-4 shadow-md md:hidden bg-white z-10">
                <span class="font-bold text-xl text-gray-800">InventarioApp</span>
                <button class="text-gray-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if (isset($header))
                    <header class="mb-6">
                        <h2 class="text-3xl font-bold text-gray-800">
                            {{ $header }}
                        </h2>
                    </header>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
