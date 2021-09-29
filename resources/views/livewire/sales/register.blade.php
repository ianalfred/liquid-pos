<div>
    <div class="relative z-0">
        <div x-data="{ show: false }"
            x-show.transition.out.opacity.duration.1500ms="show"
            x-init="@this.on('scanError', () => {
                show = true;
                setTimeout(() => {
                    show = false;
                }, 3000)
            })"
            x-transition:enter.opacity.duration.500ms
            x-transition:origin.right
            x-transition:leave.opacity.duration.1500ms
            style="display: none">
            <div class="absolute top-0 right-0 mt-4 mr-2 p-2 text-red-600 text-md font-semibold bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                <div class="flex">
                    <svg class="h-6 w-6 animate-pulse" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span class="ml-2">{{ __('Product Not Found!') }}</span>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="h-12 px-4 sm:px-0">
                <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Cash Register') }}</div>       
            </div>
            <div class="mt-4 md:grid md:grid-cols-3 md:gap-4">
                <div class="md:col-span-2 md:pr-2">
                    <form wire:submit.prevent="submit">
                        <div class="relative z-0 flex items-center w-full focus-within:text-purple-700">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-300"aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 20 20" stroke="currentColor">
                                    <path d="M12 4V5M18 16H20M14 16H12V20M12 9V12M12 12H12.01M12 12H16.01M16 20H20M4 12H8M20 12H20.01M5 8H7C7.55228 8 8 7.55228 8 7V5C8 4.44772 7.55228 4 7 4H5C4.44772 4 4 4.44772 4 5V7C4 7.55228 4.44772 8 5 8ZM17 8H19C19.5523 8 20 7.55228 20 7V5C20 4.44772 19.5523 4 19 4H17C16.4477 4 16 4.44772 16 5V7C16 7.55228 16.4477 8 17 8ZM5 20H7C7.55228 20 8 19.5523 8 19V17C8 16.4477 7.55228 16 7 16H5C4.44772 16 4 16.4477 4 17V19C4 19.5523 4.44772 20 5 20Z" />
                                </svg>
                            </div>
                            <input wire:model.defer="productScan" class="w-full pl-8 text-md text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-white border-1 border-gray-200 dark:border-gray-700 dark:bg-gray-800 rounded-lg focus:placeholder-gray-500 focus:bg-white dark:focus:bg-gray-800 focus:border-purple-700 dark:focus:border-purple-700 shadow-sm focus:outline-none form-input" type="text" placeholder="Scan product..." aria-label="Search" autofocus />
                            <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                                <div wire:loading wire:target="submit">
                                    <x-spinner></x-spinner>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-4">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-800 sm:rounded-lg">
                                <div class="{{!empty($items) ? 'flex justify-between min-w-full px-6 py-2 bg-white dark:bg-gray-800': 'min-w-full px-6 py-2 bg-white dark:bg-gray-800'}}">
                                    <div class="text-lg sm:text-xl font-semibold text-purple-700 dark:text-gray-300">
                                        {{ __('Scanned Products') }}
                                    </div>
                                    @if (!empty($items))
                                        <div class="flex items-center justify-center content-center">
                                            <div wire:click="cancelSale" class="py-1 px-2 cursor-pointer border border-red-600 rounded-lg transform hover:scale-110 transition duration-500 ease-in-out disabled:opacity-25 dark:disabled:opacity-75" wire:loading.attr="disabled">
                                                <div class="text-sm text-center text-red-600 font-semibold">
                                                    <span wire:loading.remove wire:target="cancelSale">{{ __('Cancel Scans')}}</span>
                                                    <span wire:loading wire:target="cancelSale">{{ __('Cancelling...')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if (!empty($items))
                                    <div class="px-6">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach ($items as $item)
                                                <div class="md:col-span-1 p-2 bg-gray-50 dark:bg-gray-900 border border-gray-50 dark:border-gray-700 shadow-md rounded-lg">
                                                    <div class="flex justify-between">
                                                        <div class="flex">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                @if ($item['image'])
                                                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/products/'.$item['image']) }}" alt="">
                                                                @else
                                                                    <x-no-image name-string="{{ $item['name'] }}" :height="10" :width="10" />
                                                                @endif
                                                            </div>
                                                            <div class="ml-2">
                                                                <div class="text-sm text-gray-500 dark:text-gray-400 font-semibold truncate">{{ $item['name'] }}</div>
                                                                <div class="text-md text-gray-800 dark:text-gray-200 font-semibold">{{ __('Ksh. ') .$item['selling_price']*$item['quantity'] }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="text-center">
                                                                <div class="text-sm text-gray-500 dark:text-gray-400 font-medium">{{ __('Quantity') }}</div>
                                                                <div class="text-md text-gray-800 dark:text-gray-200 font-semibold">{{ $item['quantity'] }}</div>
                                                            </div>
                                                            <div class="flex items-center justify-center">
                                                                <div wire:click="reduceProductInventory({{ $item['id'] }})" class="flex items-center justify-center ml-4 cursor-pointer transform hover:scale-110 transition duration-500 ease-in-out">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600  hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path d="M15 12H9M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"/>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-2"></div>
                                @else
                                    <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                                        <div class="flex justify-center">
                                            <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M12 4V5M18 16H20M14 16H12V20M12 9V12M12 12H12.01M12 12H16.01M16 20H20M4 12H8M20 12H20.01M5 8H7C7.55228 8 8 7.55228 8 7V5C8 4.44772 7.55228 4 7 4H5C4.44772 4 4 4.44772 4 5V7C4 7.55228 4.44772 8 5 8ZM17 8H19C19.5523 8 20 7.55228 20 7V5C20 4.44772 19.5523 4 19 4H17C16.4477 4 16 4.44772 16 5V7C16 7.55228 16.4477 8 17 8ZM5 20H7C7.55228 20 8 19.5523 8 19V17C8 16.4477 7.55228 16 7 16H5C4.44772 16 4 16.4477 4 17V19C4 19.5523 4.44772 20 5 20Z" />
                                            </svg>
                                        </div>
                                        <div class="text-3xl">No Products Scanned</div>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-1 mt-2 md:mt-0 md:pl-2">
                    <div class="ml-4 py-3 px-3 w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                        @if (isset($newItem))
                            <div class="flex">
                                <div class="flex-shrink-0 h-20 w-20">
                                    @if ($newItem->image)
                                        <img class="h-20 w-20 rounded-lg" src="{{ asset('storage/products/'.$newItem->image) }}" alt="">
                                    @else
                                        <x-no-image name-string="{{ $newItem->name }}" :height="20" :width="20" />
                                    @endif
                                </div>
                                <div class="ml-2">
                                    <div class="text-lg text-gray-800 dark:text-gray-200 font-semibold truncate">{{ $newItem->name }}</div>
                                    <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ $newItem->category->name }}</div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ __('upc/ean:') }}</div>
                                <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $newItem->upc_ean }}</div>
                            </div>
                            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-1">
                                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ __('unit price:') }}</div>
                                    <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh. " .$newItem->selling_price }}</div>
                                </div>
                                <div class="md:col-span-1">
                                    <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ __('Capacity/Size:') }}</div>
                                    <div class="ml-2 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $newItem->capacity_size }}</div>
                                </div>
                            </div>
                        @else
                            <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                                <div class="flex justify-center">
                                    <svg class="w-12 h-12" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M3 9C3 7.89543 3.89543 7 5 7H5.92963C6.59834 7 7.2228 6.6658 7.59373 6.1094L8.40627 4.8906C8.7772 4.3342 9.40166 4 10.0704 4H13.9296C14.5983 4 15.2228 4.3342 15.5937 4.8906L16.4063 6.1094C16.7772 6.6658 17.4017 7 18.0704 7H19C20.1046 7 21 7.89543 21 9V18C21 19.1046 20.1046 20 19 20H5C3.89543 20 3 19.1046 3 18V9Z" />
                                        <path d="M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z" />
                                    </svg>
                                </div>
                                <div class="text-2xl">Scanned Product</div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 ml-4 py-3 px-3 w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg">
                        <div class="text-sm text-gray-600 dark:text-gray-400 font-medium">{{ __('Amount Summary') }}</div>
                        <div class="mt-2 flex justify-between">
                            <div class="text-lg text-gray-600 dark:text-gray-400 font-medium">{{ __('Total:') }}</div>
                            @if ($total_selling_price)
                                <div class="ml-2 text-lg text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh. " .$total_selling_price }}</div>
                            @else
                                <div class="ml-2 text-lg text-gray-700 dark:text-gray-300 font-semibold truncate">{{ __("Ksh. 0") }}</div>    
                            @endif
                        </div>
                        @if ($total_selling_price)
                            <div class="mt-2 flex">
                                <div class="w-1/2 mr-2 text-lg text-gray-600 dark:text-gray-400 font-medium">{{ __('Amount:') }}</div>
                                <div class="w-1/2 ml-2">
                                    <x-currency-input wire:model.defer="amountPaid" id="amountPaid" type="text" class="w-full block" />
                                    <x-jet-input-error for="amountPaid" class="mt-2" />
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="mt-3 ml-4 -mr-3">
                        <x-jet-button class="w-full flex justify-center items-center shadow-md" wire:click="confirmCheckOut" wire:loading.attr="disabled">
                            <div class="mr-2">
                                <div wire:loading.remove wire:target="confirmCheckOut">
                                    {{ __('Finish Sale') }}
                                </div>
                                <div wire:loading wire:target="confirmCheckOut">
                                    {{ __('Opening Checkout...') }}
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" />
                            </svg>
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-jet-dialog-modal wire:model="confirmingCheckOut" maxWidth="md">
        <x-slot name="title">
            {{ __('Checkout Summary') }}
        </x-slot>
        <x-slot name="content">
            <div class="max-w-sm text-sm text-gray-600 dark:text-gray-300 break-words">
                {{ __('Please confirm the cash sale information below before checking out.') }}
            </div>
            <div class="flex mt-3">
                <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Number of items:') }}</div>
                <div class="ml-3 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ $total_items }}</div>
            </div>
            <div class="flex mt-2">
                <div class="w-1/2 flex">
                    <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Total:') }}</div>
                    <div class="ml-3 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh. " .$total_selling_price }}</div>
                </div>
                <div class="w-1/2 flex">
                    <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Amount:') }}</div>
                    <div class="ml-3 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh. " .$amountPaid }}</div>
                </div>
            </div>
            <div class="mt-2 flex">
                <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Balance:') }}</div>
                <div class="ml-3 text-md text-gray-700 dark:text-gray-300 font-semibold truncate">{{ "Ksh. " .$amountPaid - $total_selling_price }}</div>
            </div>
            <div class="mt-2">
                <div class="text-md text-gray-600 dark:text-gray-400 font-medium">{{ __('Payment Type:') }}</div>
                <x-select>
                    <x-slot name="title">
                        {{ $paymentType }}
                    </x-slot>
                    <x-slot name="options">
                        <li wire:click="$set('paymentType', 'Cash')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <div class="flex items-center">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="{{ $paymentType == 'Cash' ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                    {{ __('Cash') }}
                                </span>
                            </div>
                            @if ($paymentType == 'Cash')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </li>
                        <li wire:click="$set('paymentType', 'Mobile Money')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <div class="flex items-center">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <span class="{{ $paymentType == 'Mobile Money' ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                    {{ __('Mobile Money') }}
                                </span>
                            </div>
                            @if ($paymentType == 'Mobile Money')
                                <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            @endif
                        </li>
                    </x-slot>
                </x-select>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCheckOut')" wire:loading.attr="disabled">
                <span>{{ __('Cancel') }}</span>
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="finishSale"  wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="finishSale">{{ __('Checkout') }}</span>
                <span wire:loading wire:target="finishSale">{{ __('Processing...') }}</span>
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>