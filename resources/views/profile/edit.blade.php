<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Grid Layout para mejor distribución -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tarjeta: Información del Perfil -->
                <div class="p-4 sm:p-8 bg-white shadow-xl rounded-2xl border-t-4 border-sky-500 hover:shadow-2xl transition-shadow duration-300">
                    <div class="max-w-xl">
                        <div class="flex items-center mb-4">
                            <div class="bg-sky-100 p-2 rounded-full mr-3 text-sky-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Información Personal</h3>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Tarjeta: Seguridad / Contraseña -->
                <div class="p-4 sm:p-8 bg-white shadow-xl rounded-2xl border-t-4 border-purple-500 hover:shadow-2xl transition-shadow duration-300">
                    <div class="max-w-xl">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-2 rounded-full mr-3 text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">Seguridad</h3>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Tarjeta: Zona de Peligro (Full Width) -->
            <div class="p-4 sm:p-8 bg-red-50 shadow-inner rounded-2xl border border-red-200 mt-6">
                <div class="max-w-xl mx-auto text-center">
                    <h3 class="text-lg font-bold text-red-600 mb-2">Zona de Peligro</h3>
                    <p class="text-sm text-red-500 mb-4">Estas acciones son irreversibles. Ten cuidado.</p>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
