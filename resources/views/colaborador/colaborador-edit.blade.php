@extends('layouts.master')
@section('title', 'Colaboradores')
@section('active-colaboradores', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div
                class="w-full  rounded-t-sm  flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Colaborador</h2>
            </div>
            <div class="w-fullrounded-b-sm p-4 bg-white">
                <form action="{{route('colaborador.update', $colaborador->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="nome"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" id="nome" name="nome" value="{{ $colaborador->nome }}" readonly disabled
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                     dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="cpf"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="{{$colaborador->cpf}}" readonly disabled
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                    </div>
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" id="email" name="email" value="{{$colaborador->email}}" readonly disabled
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="unidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidade</label>
                            <input type="text" id="unidade" name="unidade"
                                   value="{{$colaborador->unidade->nome_fantasia}}" readonly disabled
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                        </div>
                    </div>
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                            <input type="text" id="cargo" name="cargo"
                                   value="{{$colaborador->cargoColaborador->cargo->cargo}}" readonly disabled
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6">
                            <label for="nota_desempenho"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nota de
                                desempenho</label>
                            <input type="number" id="nota_desempenho" min="0" max="10" name="nota_desempenho"
                                   value="{{ $colaborador->cargoColaborador->nota_desempenho ?? old('nota_desempenho') }}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nota_desempenho')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Salvar
                    </button>
                    <a href="{{route('colaboradores.index')}}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">
        $('#cpf').mask('000.000.000-00', {reverse: true});
    </script>
@endsection



