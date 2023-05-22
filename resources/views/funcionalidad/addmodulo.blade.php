
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Profesor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('modulo.addModulo') }}" method="POST">
                        @csrf
                        @method('post')
                        <label for="nombre">Nombre del Módulo:</label>
                        <input type="text" name="nombre" id="nombre" required>

                        <!-- Agrega aquí los campos adicionales del módulo -->

                        <button type="submit">Añadir Módulo</button>
                    </form>

                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($modulos as $modulo)
                            <tr>
                                <td>{{ $modulo->id_modulo }}</td>
                                <td>{{ $modulo->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
