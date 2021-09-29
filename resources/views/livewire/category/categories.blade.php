<div>
    <div class="flex justify-between items-center h-12 px-4 sm:px-0">
        <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Categories') }}</div>
        @can('create', \App\Models\Category::class)
            <x-jet-button class="flex items-center" wire:click="categoryCreateForm" wire:loading.attr="disabled">
                <div class="mr-2">
                    <div wire:loading.remove wire:target="categoryCreateForm">
                        {{ __('New Category') }}
                    </div>
                    <div wire:loading wire:target="categoryCreateForm">
                        {{ __('Opening') }}
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-jet-button>
        @endcan
    </div>
    <div>
        <div class="mt-4 bg-gray-200 dark:bg-gray-800 p-6 w-full rounded-lg">
            <div class="relative z-0 flex items-center w-full max-w-xl focus-within:text-purple-700 z-0">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model="search" class="w-full pl-8 text-sm text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-gray-50 border-0 border-gray-200 dark:bg-gray-900 rounded-full focus:placeholder-gray-500 focus:bg-gray-50 focus:border-purple-700 focus:outline-none form-input" type="text" placeholder="Search category..." aria-label="Search" />
                <div class="absolute inset-y-0 right-0 pr-2 flex items-center">
                    <div  wire:loading wire:target="search">
                        <x-spinner></x-spinner>
                    </div>
                </div>
            </div>
            <div class="my-2 border-t border-gray-300 dark:border-gray-700"></div>
            @if ($categories->isNotEmpty())
                <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($categories as $category)
                        <div class="p-6 bg-white dark:bg-gray-900 rounded-lg z-0 shadow-lg transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
                            <div class="flex">
                                @if (isset($category->image))
                                    <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('storage/categories/'.$category->image) }}" alt="{{ $category->name }}" /> 
                                @else
                                    <x-no-image name-string="{{ $category->name }}" :height="12" :width="12" />
                                @endif
                                <div class="ml-4">
                                    <div class="text-lg text-gray-900 dark:text-gray-200">{{ $category->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $category->items_count." products" }}</div>
                                </div>
                            </div>
                            <div class="my-2 border-t border-gray-300 dark:border-gray-700"></div>
                            <div class="flex justify-end space-x-2">
                                @can('update', $category)
                                    <div wire:click="categoryEditForm({{ $category->id }})" class="cursor-pointer transform hover:-translate-y-1 transition duration-500 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600 hover:text-purple-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                @endcan
                                @can('delete', $category)
                                    <div wire:click="confirmCategoryDeletion({{ $category->id }})" class="cursor-pointer transform hover:-translate-y-1 transition duration-500 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-gray-400 dark:text-gray-600 text-md text-center align-middle overflow-y-auto py-4">
                    <div class="flex justify-center">
                        <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="text-3xl">No Categories Found</div>
                </div>
            @endif
        </div>
    </div>

    <!-- Categories Form Modal -->
    <x-jet-dialog-modal wire:model="showingCategoryForm">
        <x-slot name="title">
            @if ($editMode)
                {{ __('Update Category') }}
            @else
                {{ __('Create New Category') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label for="name" value="{{ __('Category Name:') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
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

                    <x-jet-label for="image" value="{{ __('Image') }}" />

                    <!-- Current Category Image -->
                    <div class="mt-2" x-show="! photoPreview">
                        @if (isset($selectedCategory->image))
                            <img src="{{ asset('storage/categories/'.$selectedCategory->image) }}" alt="No Image" class="rounded-full h-20 w-20 object-cover">
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
            <x-jet-secondary-button wire:click="cancelCategoryForm" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="cancelCategoryForm">{{ __('Cancel') }}</span>
                <span wire:loading wire:target="cancelCategoryForm">{{ __('Cancelling...') }}</span>
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveCategory"  wire:loading.attr="disabled">
                @if ($editMode)
                    <span wire:loading.remove wire:target="saveCategory">{{ __('Update') }}</span>
                    <span wire:loading wire:target="saveCategory">{{ __('Updating...') }}</span>
                @else
                    <span wire:loading.remove wire:target="saveCategory">{{ __('Create') }}</span>
                    <span wire:loading wire:target="saveCategory">{{ __('Creating...') }}</span>
                    
                @endif
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!--Category Deletion Modal-->
    <x-jet-confirmation-modal wire:model="showingDeletionConfirmation">
        <x-slot name="title">
            {{ __('Delete Category') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300 break-words">
                {{ __('Once this category is deleted, all of its resources and data will be permanently deleted.') }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showingDeletionConfirmation')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteCategory" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="deleteCategory">{{ __('Delete') }}</span>
                <span wire:loading wire:target="deleteCategory">
                    {{ __('Deleting...') }}
                </span>
            </x-jet-danger-button>
        </x-slot>

    </x-jet-confirmation-modal>
</div>
