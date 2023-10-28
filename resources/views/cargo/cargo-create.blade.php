@extends('layouts.master')
@section('title', 'Cargos')
@section('active-cargos', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full flex justify-between rounded-t-sm  p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Cadastro de cargo</h2>
            </div>
            <div class="w-full p-4 rounded-b-sm bg-white">
                <form action="{{route('cargos.store')}}" method="POST">
                    @csrf
                    <div class="flex flex-row grid-cols-2 gap-3">
                        <div class="mb-6">
                            <label for="cargo"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                            <input type="text" id="cargo" name="cargo" value="{{old('cargo')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                            @error('cargo')
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
                    <a href="{{route('cargos.index')}}"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
