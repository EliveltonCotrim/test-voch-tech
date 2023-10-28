@extends('layouts.master')
@section('title', 'Unidades')
@section('active-unidades', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div
                class="w-full flex justify-between rounded-t-sm  p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Cadastro de unidade</h2>
            </div>
            <div class="w-full p-4 rounded-b-sm bg-white">
                <form action="{{route('unidades.store')}}" method="POST">
                    @csrf
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="nome_fantasia"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                                fantasia</label>
                            <input type="text" id="nome_fantasia" name="nome_fantasia" value="{{old('nome_fantasia')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('nome_fantasia')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="razao_social"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Razão
                                social</label>
                            <input type="text" id="razao_social" name="razao_social" value="{{old('razao_social')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('razao_social')
                            <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="cnpj"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" value="{{old('cnpj')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                    focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                     dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('cnpj')
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
                    <a href="{{route('unidades.index')}}"
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
        $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    </script>
@endsection
