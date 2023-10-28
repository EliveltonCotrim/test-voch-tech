@extends('layouts.master')
@section('title', 'Colaboradores')
@section('active-colaboradores', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div
                class="w-full  rounded-t-sm  flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Cadastrar colaborador</h2>
            </div>
            <div class="w-fullrounded-b-sm p-4 bg-white">
                <form action="{{route('colaboradores.store')}}" method="POST">
                    @csrf
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="nome"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                            <input type="text" id="nome" name="nome" value="{{old('nome')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                     dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('nome')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="cpf"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="{{old('cpf')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('cpf')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('email')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="unidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unidade</label>
                            <select id="unidade" name="unidade_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                <option value="">Selecione..</option>
                                @foreach($uniades as $unidade)
                                    <option value="{{$unidade->id}}" {{old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->nome_fantasia}}</option>
                                @endforeach
                            </select>
                            @error('unidade_id')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                            <select id="cargo" name="cargo_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                <option value="">Selecione..</option>
                                @foreach($cargos as $cargo)
                                    <option
                                        value="{{$cargo->id}}" {{old('cargo_id') == $cargo->id ? 'selected' : ''}}>{{$cargo->cargo}}</option>
                                @endforeach
                            </select>
                            @error('cargo_id')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
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



