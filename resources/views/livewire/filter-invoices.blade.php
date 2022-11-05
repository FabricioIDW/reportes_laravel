<div>
    {{-- Filtros --}}
    <div class="bg-white rounded p-8 shadow mb-6">
        <h2 class="text-2x1 font-semibold mb-4">Generar reportes</h2>

        <div class="mb-4">
            Serie:
            <select name="serie" wire:model="filters.serie"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-32">
                <option value="">Todas</option>
                <option value="F001">F001</option>
                <option value="B001">B001</option>
            </select>
        </div>

        <div class="flex space-x-4 mb-4">
            <div>
                Desde el Nro:
                <x-jet-input type="text" class="w-20" wire:model="filters.fromNumber" />
            </div>
            <div>
                Hasta el Nro:
                <x-jet-input type="text" class="w-20" wire:model="filters.toNumber" />
            </div>
        </div>

        <div class="flex space-x-4 mb-4">
            <div>
                Desde la fecha:
                <x-jet-input type="date" class="w-36" wire:model="filters.fromDate" />
            </div>
            <div>
                Hasta la fecha:
                <x-jet-input type="date" class="w-36" wire:model="filters.toDate" />
            </div>
        </div>

        <x-jet-button wire:click="generateReport">Generar reporte</x-jet-button>

    </div>

    {{-- Tabla --}}
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Serie
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Correlativo
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Base
                    </th>
                    <th scope="col" class="py-3 px-6">
                        IGV
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total pagado
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Usuario
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Fecha de emisión
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $invoice->id }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $invoice->serie }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $invoice->correlative }}

                        </td>
                        <td class="py-4 px-6">
                            ${{ $invoice->base }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $invoice->igv }}
                        </td>
                        <td class="py-4 px-6">
                            ${{ $invoice->total }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $invoice->user->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $invoice->created_at->format('d/m/y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Links --}}
        <div class="mt-4">
            {{ $invoices->links() }}
        </div>
    </div>

</div>
