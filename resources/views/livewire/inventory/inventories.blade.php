<div>
    <div class="flex justify-between items-center h-12 px-4 sm:px-0">
        <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Product Inventories') }}</div>
        @can('create', App\Models\User::class)
            <a href="{{ route('create-inventory') }}" class="flex items-center px-2 py-1 bg-purple-600 border border-transparent rounded-md font-semibold text-md text-white tracking-widest shadow-md hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:shadow-outline-purple transition ease-in-out duration-150">
                <div class="mr-2">
                {{ __('Make Inventory') }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        @endcan
    </div>

    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-100 dark:border-gray-800 sm:rounded-lg">
                <div class="flex justify-between min-w-full px-6 py-4 bg-white dark:bg-gray-800">
                    <div class="relative z-0 flex items-center w-full max-w-xl focus-within:text-purple-700">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model.debounce.350ms="search" class="w-full pl-8 text-sm text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-gray-200 border-0 border-gray-200 dark:bg-gray-900 rounded-full focus:placeholder-gray-500 focus:bg-gray-100 focus:border-purple-700 focus:outline-none form-input" type="text" placeholder="Search inventory..." aria-label="Search" />
                        <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                            <div  wire:loading wire:target="search">
                                <x-spinner></x-spinner>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <div class="ml-4 p-2 flex items-center text-gray-600 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 bg-gray-200 dark:bg-gray-700 cursor-pointer overflow-hidden rounded-md">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M3 4C3 3.44772 3.44772 3 4 3H20C20.5523 3 21 3.44772 21 4V6.58579C21 6.851 20.8946 7.10536 20.7071 7.29289L14.2929 13.7071C14.1054 13.8946 14 14.149 14 14.4142V17L10 21V14.4142C10 14.149 9.89464 13.8946 9.70711 13.7071L3.29289 7.29289C3.10536 7.10536 3 6.851 3 6.58579V4Z" />
                                    </svg>
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-48 text-xs text-gray-800 dark:text-gray-300">
                                    <div wire:click="$set('inventoryFilter', null)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('All') }}
                                    </div>
                                    <div wire:click="$set('inventoryFilter', 1)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('In') }}
                                    </div>
                                    <div wire:click="$set('inventoryFilter', 2)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('Out') }}
                                    </div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
                @if ($inventories->isNotEmpty())
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    In/Out
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Size
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Made By
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Remarks
                                </th>
                                @can('viewAny', \App\Models\User::class)
                                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Actions
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td class="px-6 py-2 whitespace-nowrap flex justify-center">
                                        @if ($inventory->quantity > 0)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500  hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M5 11L12 4L19 11M5 19L12 12L19 19" />
                                            </svg>
                                            <div class="ml-2 text-sm text-green-500 font-semibold">{{ "+" .$inventory->quantity }}</div>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500  hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M19 13L12 20L5 13M19 5L12 12L5 5" />
                                            </svg>
                                            <div class="ml-2 text-sm text-red-500 font-semibold">{{ $inventory->quantity }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center text-gray-300">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($inventory->item->image)
                                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/products/'.$inventory->item->image) }}" alt="">
                                                @else
                                                    <x-no-image name-string="{{ $inventory->item->name }}" :height="10" :width="10" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="flex text-sm font-semibold text-gray-800 dark:text-gray-300">
                                                    {{ $inventory->item->name }}
                                                </div>
                                                @if ($inventory->item->quantity > 0)
                                                    <div class="text-sm text-green-500 dark:text-green-700">
                                                        in stock
                                                    </div>
                                                @else
                                                    <div class="text-sm text-red-500 dark:text-red-700">
                                                        out of stock
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300 font-semibold">
                                        {{ $inventory->item->capacity_size }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ $inventory->user->name }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ $inventory->remarks }}
                                    </td>
                                    @can('viewAny', \App\Models\User::class)
                                        <td class="px-6 py-2 whitespace-nowrap flex justify-center">
                                            @can('delete', $inventory)
                                                <button wire:click="confirmInventoryDeletion({{ $inventory->id }})" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-5 h-5 text-red-600 hover:text-red-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            @endcan
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="min-w-full py-3 px-6 border-t border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800">
                        <div>
                            {{ $inventories->links('components.custom-pagination-links-view') }}
                        </div>
                    </div>
                @else
                    <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                        <div class="flex justify-center">
                            <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                    <div class="text-3xl">No Inventories Found</div>
                </div>
                @endif
                
            </div>
        </div>
    </div>

    <!--Inventory Deletion Modal-->
    <x-jet-confirmation-modal maxWidth="md" wire:model="showingDeletionConfirmation">
        <x-slot name="title">
            {{ __('Delete Inventory') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300 break-words">
                {{ __('Once this inventory is deleted, all of its resources and data will be permanently deleted.') }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingDeletionConfirmation')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteInventory" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="deleteInventory">{{ __('Delete') }}</span>
                <span wire:loading wire:target="deleteInventory">
                    {{ __('Deleting...') }}
                </span>
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
