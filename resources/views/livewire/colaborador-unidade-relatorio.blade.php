<div class="container rounded-sm border border-gray-200 mt-5 shadow dark:bg-gray-800 dark:border-gray-700">
    <div
        class="w-full  rounded-t-sm  flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
        <h2>Total de Colaboradores por Unidade</h2>
    </div>
    <div class="w-fullrounded-b-sm bg-white">
        <div class="relative overflow-x-auto  sm:rounded-lg">
            <div class="flex p-4 items-center justify-between pb-4 bg-white dark:bg-gray-900">
                <div class="mb-6">
                    <label for="unidade"
                           class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Unidade</label>
                    <select id="unidade" name="unidade_id" wire:model="unidade_id"
                            class="bg-gray-50 border sm:text-xs border-gray-300 text-gray-900 rounded-lg
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                    dark:focus:border-blue-500">
                        <option value="">Selecione..</option>
                        @foreach($unidades_filtro as $unidade)
                            <option
                                value="{{$unidade->id}}">{{$unidade->nome_fantasia}}</option>
                        @endforeach
                    </select>
                    @error('unidade_id')
                    <span class="text-red-500 text-xs italic" role="alert">
                                    {{$message}}
                                </span>
                    @enderror
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nome Fantasia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Razão Social
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CNPJ
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total de Colaboradores
                    </th>
                </tr>
                </thead>
                <tbody>

                @forelse($unidades as $unidade)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$unidade->nome_fantasia}}
                        </th>

                        <td class="px-6 py-4">
                            {{$unidade->razao_social}}
                        </td>
                        <td class="px-6 py-4">
                            @cnpj($unidade->cnpj)
                        </td>
                        <td class="px-6 py-4">
                            {{$unidade->colaboradores->count()}}
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
                <span><strong>Total:</strong> {{ $unidades->total()}}</span>
                {{ $unidades->appends($filters ?? '')->links()}}
            </nav>
        </div>

    </div>
</div>
