@extends('layouts.master')
@section('title', 'Cargos')
@section('active-cargos', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full rounded-t-sm flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Cargos</h2>
                <a href="{{route('cargos.create')}}"
                   class="bg-green-700 px-2 py-1 flex gap-1 focus:ring-4 focus:outline-none text-white hover:bg-green-800 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                    </svg>
                    Cadastrar
                </a>
            </div>
            <div class="w-full rounded-b-sm bg-white">
                <div class="relative overflow-x-auto  sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($cargos as $cargo)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$cargo->cargo}}
                                </th>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Nenhum registro encontrado</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <nav class="flex p-4 items-center justify-start pt-4" aria-label="Table navigation">
                        <span><strong>Total:</strong> {{ $cargos->count()}}</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
