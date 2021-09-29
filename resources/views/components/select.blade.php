<div class="relative z-20" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        <button type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label" class="mt-1 relative w-full text-gray-800 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm pl-3 pr-10 py-3 text-left cursor-default focus:outline-none focus:border-purple-600 dark:focus:border-purple-600 sm:text-sm">
            <span class="flex items-center">
                <span class="block truncate">
                    {{ $title }}
                </span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <!-- Heroicon name: solid/selector -->
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
    </div>

    <div x-show="open"
        x-transition:enter=""
        x-transition:enter-start=""
        x-transition:enter-end=""
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="transform opacity-100"
        x-transition:leave-end="transform opacity-0"
        class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-700 shadow-lg"
        @click="open = false">
        <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
            <!--
            Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.
    
            Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
            -->
            {{ $options }}
    
            <!-- More items... -->
        </ul>
    </div>
</div>