<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Editando nivel de acesso do usuário <strong>{{$user->name}}</strong></p>

                    <p class="">Nível de acesso  atual: <strong>{{$user->level}}</strong></p>
                </div>

                <div class="p-6 text-gray-900">
                    <form action="{{route('user.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="level" class="block text-sm font-medium text-gray-700">Nível de acesso</label>
                            <select name="level" id="level" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected disabled> Selecione uma opção</option>
                                <option value="user">Usuário</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fa-regular fa-floppy-disk mr-2"></i>Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
