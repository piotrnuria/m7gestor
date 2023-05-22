<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    @if(auth()->user()->rol == 1)
                    {{ __('Dashboard Profesor') }}
                        <!-- Contenido del dashboard del profesor -->
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('modulo.showModulos') }}">Lista Modulos</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('modulo.misModulos') }}">Mis Modulos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modulo.viewAddModulo') }}">Añadir Modulo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modulo.viewAddUf') }}">Añadir UF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modulo.deleteUser') }}">Eliminar Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modulo.mostrarFormulario') }}">Modulos + UF'es</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('modulo.viewAvaluacion') }}">Avaluacion</a>
                            </li>
                          </ul>



                    @elseif(auth()->user()->rol == 2)
                    {{ __('Dashboard Alumno') }}
                        <!-- Contenido del dashboard del alumno -->
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('modulo.showModulos') }}">Lista Modulos</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('modulo.misModulos') }}">Mis Modulos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Mis Notas</a>
                            </li>
                          </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
