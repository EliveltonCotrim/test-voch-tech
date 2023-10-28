@extends('layouts.master')
@section('title', 'Colaboradores')
@section('active-colaboradores', 'bg-gray-100 dark:bg-gray-800')
@section('content')
    <div class="p-4 rounded-sm dark:border-gray-700 mt-14">
        <div class="container rounded-sm border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
            <div
                    class="w-full  rounded-t-sm  flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                <h2>Colaboradores</h2>
                <a href="{{route('colaboradores.create')}}"
                   class="bg-green-700 px-2 py-1 flex gap-1 focus:ring-4 focus:outline-none text-white hover:bg-green-800 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"/>
                    </svg>
                    Cadastrar
                </a>
            </div>
            <div class="w-fullrounded-b-sm bg-white">
                <div class="relative overflow-x-auto  sm:rounded-lg">
                    <div class="flex p-4 items-center justify-between pb-4 bg-white dark:bg-gray-900">
                        <label for="table-search" class="sr-only">Search</label>
                        <form class="flex gap-3" action="{{route('colaboradores.search')}}" method="GET">
                            @csrf
                            <div class="mb-6">
                                <label for="cargo"
                                       class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                                <select id="cargo" name="cargo_id"
                                        class="bg-gray-50 border sm:text-xs border-gray-300 text-gray-900 rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                    <option value="">Selecione..</option>
                                    @foreach($cargos as $cargo)
                                        <option
                                                value="{{$cargo->id}}" {{isset($filters['cargo_id']) && $filters['cargo_id'] == $cargo->id ? 'selected' : ''}}>{{$cargo->cargo}}</option>
                                    @endforeach
                                </select>
                                @error('cargo_id')
                                <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="unidade"
                                       class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Unidade</label>
                                <select id="unidade" name="unidade_id"
                                        class="bg-gray-50 border sm:text-xs border-gray-300 text-gray-900 rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                    <option value="">Selecione..</option>
                                    @foreach($unidades as $unidade)
                                        <option
                                                value="{{$unidade->id}}" {{isset($filters['unidade_id']) && $filters['unidade_id'] == $unidade->id ? 'selected' : ''}}>{{$unidade->nome_fantasia}}</option>
                                    @endforeach
                                </select>
                                @error('unidade_id')
                                <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="nota"
                                       class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nota</label>
                                <select id="nota" name="nota"
                                        class="bg-gray-50 border sm:text-xs border-gray-300 text-gray-900 rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                                    <option value="">Selecione..</option>
                                    <option value="ASC" {{isset($filters['nota']) && $filters['nota'] == 'ASC' ? 'selected' : ''}}>
                                        Crescente
                                    </option>
                                    <option value="DESC" {{isset($filters['nota']) && $filters['nota'] == 'DESC' ? 'selected' : ''}}>
                                        Decrescente
                                    </option>
                                </select>
                                @error('nota')
                                <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="mb-6 flex items-end">
                                <button type="submit"
                                        class="bg-green-700 px-2 py-1 flex gap-1 focus:ring-4 focus:outline-none text-white hover:bg-green-800 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                    </svg>
                                    Pesquisar
                                </button>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                CPF
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unidade
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cargo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nota de desempenho
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($colaboradores as $colaborador)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$colaborador->nome}}
                                </th>
                                <td class="px-6 py-4">
                                    @cpf($colaborador->cpf)
                                </td>
                                <td class="px-6 py-4">
                                    {{$colaborador->email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$colaborador->unidade->nome_fantasia}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$colaborador->cargoColaborador->cargo->cargo ?? '' }}

                                </td>
                                <td class="px-6 flex gap-3 items-center justify-center py-4">
                                    {{$colaborador->cargoColaborador->nota_desempenho}}
                                    <a href="{{route('colaborador.edit', $colaborador->id)}}"
                                       class="text-blue-400 hover:text-blue-500"
                                       type="button" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 26"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Nenhum registro encontrado</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <nav class="flex p-4 items-center justify-between pt-4" aria-label="Table navigation">
                        <span><strong>Total:</strong> {{ $colaboradores->total()}}</span>
                        {{ $colaboradores->appends($filters ?? '')->links()}}
                    </nav>
                </div>

            </div>
        </div>
    </div>
@endsection
