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

                    {{-- <select name="user_id">
                        <option value="">Elige un alumno</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select> --}}

                    {{-- <table>
                        <thead>
                            <tr>
                                <th>ID Nota</th>
                                <th>User</th>
                                <th>Modulo</th>
                                <th>Unidad Formativa</th>
                                <th>Nota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                                <tr>
                                    <td>{{ $nota->id_nota }}</td>
                                    <td>{{ $nota->user->name }}</td>
                                    <td>{{ $nota->modulo->nombre }}</td>
                                    <td>{{ $nota->unidadFormativa->nombre }}</td>
                                    <td>{{ $nota->nota }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
