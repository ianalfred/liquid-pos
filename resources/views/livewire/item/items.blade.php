<div>
    <div class="flex justify-between items-center h-12 px-4 sm:px-0">
        <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Products') }}</div>
        @can('create', \App\Models\User::class)
            <x-jet-button class="flex items-center" wire:click="productCreateForm" wire:loading.attr="disabled">
                <div class="mr-2">
                    <div wire:loading.remove wire:target="productCreateForm">
                        {{ __('New Product') }}
                    </div>
                    <div wire:loading wire:target="productCreateForm">
                        {{ __('Opening') }}
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-jet-button>
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
                        <input wire:model.debounce.350ms="search" class="w-full pl-8 text-sm text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-gray-200 border-0 border-gray-200 dark:bg-gray-900 rounded-full focus:placeholder-gray-500 focus:bg-gray-100 focus:border-purple-700 focus:outline-none form-input" type="text" placeholder="Search product..." aria-label="Search" />
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
                                    <div wire:click="$set('stockFilter', null)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('All') }}
                                    </div>
                                    <div wire:click="$set('stockFilter', 1)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('In Stock') }}
                                    </div>
                                    <div wire:click="$set('stockFilter', 2)" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('Out of Stock') }}
                                    </div>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
                @if ($items->isNotEmpty())
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Size
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Qauntity
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Selling Price
                                </th>
                                @can('viewAny', \App\Models\User::class)
                                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                        Actions
                                    </th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center text-gray-300">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($item->image)
                                                    <img class="h-10 w-10 rounded-full" src="{{ asset('storage/products/'.$item->image) }}" alt="">
                                                @else
                                                    <x-no-image name-string="{{ $item->name }}" :height="10" :width="10" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="flex text-sm font-semibold text-gray-800 dark:text-gray-300">
                                                    {{ $item->name }}
                                                </div>
                                                @if ($item->quantity > 0)
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
                                        {{ $item->capacity_size }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300 font-semibold">
                                        {{ $item->category->name }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ "Ksh. ".$item->selling_price }}
                                    </td>
                                    @can('viewAny', \App\Models\User::class)
                                        <td class="px-6 py-2 whitespace-nowrap flex justify-center">
                                            @can('update', $item)
                                                <div wire:click="productEditForm({{ $item->id }})" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600  hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </div>
                                            @endcan
                                            @can('delete', $item)
                                                <button wire:click="confirmProductDeletion({{ $item->id }})" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
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
                            {{ $items->links('components.custom-pagination-links-view') }}
                        </div>
                    </div>
                @else
                    <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                        <div class="flex justify-center">
                            <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11M5 9H19L20 21H4L5 9Z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    <div class="text-3xl">No Products Found</div>
                </div>
                @endif
                
            </div>
        </div>
    </div>

    <!-- Product Form Modal -->
    <x-jet-dialog-modal wire:model="showingProductForm">
        <x-slot name="title">
            @if ($editMode)
                {{ __('Update Product') }}
            @else
                {{ __('Create New Product') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label for="upc_ean" value="{{ __('UPC/EAN:') }}" />
                <x-jet-input id="upc_ean" type="text" class="mt-1 block w-full" wire:model.defer="upc_ean" autocomplete="upc_ean" />
                <x-jet-input-error for="upc_ean" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name:') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="sm:flex mt-4">
                <div class="sm:w-1/2 pr-2">
                    <x-jet-label for="capacity_size" value="{{ __('Capacity/Size:') }}" />
                    <x-jet-input id="capacity_size" type="text" class="mt-1 block w-full" wire:model.defer="capacity_size" autocomplete="capacity_size" />
                    <x-jet-input-error for="capacity_size" class="mt-2" />
                </div>
                <div class="sm:w-1/2 pl-2 mt-4 sm:mt-0">
                    <x-jet-label for="category_id" value="{{ __('Category:') }}" />
                    <x-select>
                        <x-slot name="title">
                            {{ $selectedCategoryName }}
                        </x-slot>
                        <x-slot name="options">
                            @foreach ($categories as $category)
                                <li wire:click="selectingCategory({{ $category->id }}, '{{$category->name}}')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                                    <div class="flex items-center">
                                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                        <span class="{{ $selectedCategoryId == $category->id ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                            {{ $category->name }}
                                        </span>
                                    </div>
                            
                                    @if ($selectedCategoryId == $category->id)
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </x-slot>
                    </x-select>
                    <x-jet-input-error for="category_id" class="mt-2" />
                </div>
            </div>
            <div class="sm:flex mt-4">
                <div class="sm:w-1/2 pr-2">
                    <x-jet-label for="cost_price" value="{{ __('Cost Price:') }}" />
                    <x-currency-input id="cost_price" type="text" class="mt-1 block w-full" wire:model.defer="cost_price" autocomplete="cost_price" />
                    <x-jet-input-error for="cost_price" class="mt-2" />
                </div>
                <div class="sm:w-1/2 pl-2 mt-4 sm:mt-0">
                    <x-jet-label for="selling_price" value="{{ __('Selling Price:') }}" />
                    <x-currency-input id="selling_price" type="text" class="mt-1 block w-full" wire:model.defer="selling_price" autocomplete="selling_price" />
                    <x-jet-input-error for="selling_price" class="mt-2" />
                </div>
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Brief Description:') }}" />
                <textarea id="description" type="text" class="mt-1 px-3 py-2 w-full border-gray-300 dark:border-gray-700 text-gray-100 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-200 bg-gray-100 dark:bg-gray-700 focus:outline-none focus:border-purple-600 dark:focus:border-purple-600  rounded-md shadow-sm" rows="4" wire:model.defer="description" autocomplete="description" ></textarea>
                <x-jet-input-error for="description" class="mt-2" />
            </div>
            <div class="mt-4">
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <input type="file" class="hidden" 
                        wire:model="image"
                        x-ref="photo"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <x-jet-label for="image" value="{{ __('Image:') }}" />

                    <!-- Current Category Image -->
                    <div class="mt-2" x-show="! photoPreview">
                        @if (isset($selectedProduct->image))
                            <img src="{{ asset('storage/products/'.$selectedProduct->image) }}" alt="No Image" class="rounded-full h-20 w-20 object-cover">
                        @else
                            <div class="flex justify-center items-center h-20 w-20 rounded-full font-semibold text-md text-gray-50 bg-gray-500">
                                <div>No Image</div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-2" x-show="photoPreview">
                        <span class="block rounded-full w-20 h-20"
                            x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()" wire:loading.attr="disabled">
                        <div wire:loading.remove wire:target="image">{{ __('Select Image') }}</div>
                        <div wire:loading wire:target="image">{{ __('Uploading...') }}</div>
                    </x-jet-secondary-button>
                    
                    <x-jet-input-error for="image" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancelProductForm" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="cancelProductForm">{{ __('Cancel') }}</span>
                <span wire:loading wire:target="cancelProductForm">{{ __('Cancelling...') }}</span>
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveProduct"  wire:loading.attr="disabled">
                @if ($editMode)
                    <span wire:loading.remove wire:target="saveProduct">{{ __('Update') }}</span>
                    <span wire:loading wire:target="saveProduct">{{ __('Updating...') }}</span>
                @else
                    <span wire:loading.remove wire:target="saveProduct">{{ __('Create') }}</span>
                    <span wire:loading wire:target="saveProduct">{{ __('Creating...') }}</span>
                    
                @endif
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!--Product Deletion Modal-->
    <x-jet-confirmation-modal wire:model="showingDeletionConfirmation">
        <x-slot name="title">
            {{ __('Delete Product') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300 break-words">
                {{ __('Once this product is deleted, all of its resources and data will be permanently deleted.') }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingDeletionConfirmation')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteProduct" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="deleteProduct">{{ __('Delete') }}</span>
                <span wire:loading wire:target="deleteProduct">
                    {{ __('Deleting...') }}
                </span>
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
