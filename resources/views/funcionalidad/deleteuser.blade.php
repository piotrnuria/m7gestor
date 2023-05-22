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

                    <form id="delete-form" action="{{ route('modulo.deleteUser') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <label for="iduser">ID del user:</label>
                        <input type="number" name="iduser" id="iduser" required>

                        <!-- Agrega aquí los campos adicionales del módulo -->

                        <button type="submit">Eliminar User</button>
                    </form>
                    {{-- <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Eliminar User</a> --}}

                    <hr>

                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id_user }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
