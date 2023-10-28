<div class="container rounded-sm border border-gray-200 mt-5 shadow dark:bg-gray-800 dark:border-gray-700">
    <div
        class="w-full  rounded-t-sm  flex justify-between p-3 text-gray-500 border-b border-gray-200 bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
        <h2>Ranking de Colaboradores melhores avaliados </h2>
    </div>
    <div class="w-fullrounded-b-sm bg-white">
        <div class="relative overflow-x-auto  sm:rounded-lg">
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
                            <span class="bg-green-500 rounded px-2 py-1 text-white text-bold">
                            {{$colaborador->cargoColaborador->nota_desempenho}}

                            </span>

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
