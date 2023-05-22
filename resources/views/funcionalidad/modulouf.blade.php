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

                    <form action="{{ route('modulo.guardarRelacion') }}" method="POST">
                        @csrf
                        @method('POST')
                        <label for="modulo">Módulo:</label>
                        <select name="modulo" id="modulo" required>
                            <option value="">Seleccione un módulo</option>
                            @foreach ($modulos as $modulo)
                                <option value="{{ $modulo->id_modulo }}">{{ $modulo->nombre }}</option>
                            @endforeach
                        </select>

                        <label for="unidadFormativa">Unidad Formativa:</label>
                        <select name="unidadFormativa" id="unidadFormativa" required>
                            <option value="">Seleccione una unidad formativa</option>
                            @foreach ($unidadesFormativas as $uf)
                                <option value="{{ $uf->id_uf }}">{{ $uf->nombre }}</option>
                            @endforeach
                        </select>

                        <button type="submit">Guardar</button>
                    </form>

                    <hr>
                    <br>
                    <h3>Los modulos con sus uf'es</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Módulo</th>
                                <th>Unidad Formativa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ufes as $ufe)
                            <tr>
                                <td>{{ $ufe->id }}</td>
                                <td>{{ $moduloss[$ufe->id_modulo] }}</td>
                                <td>{{ $ufs[$ufe->id_uf] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
