<nav class="absolute inset-y-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative lg:sticky top-0 z-20 w-72 py-3 bg-purple-900 dark:bg-gray-800 text-gray-300 dark:text-gray-400 h-screen"
    :class="{'translate-x-0 ease-in opacity-100': nav_open === true, '-translate-x-full ease-out opacity-0': nav_open === false}">
    <div>
        <div class="flex justify-between">
            <div class="flex h-12 mx-3 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center p-2">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <span class="font-bold text-2xl sm:text-3xl text-white dark:text-gray-100">{{ config('app.name', 'Liquid') }}</span>
            </div>
            <button class="px-2 my-2 mx-3 focus:outline-none focus:bg-purple-800 hover:bg-purple-800 dark:focus:bg-gray-700 dark:hover:bg-gray-700 rounded-md lg:hidden" @click="nav_open = false">
                <svg class="h-6 w-6 text-white dark:text-gray-100" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 19L8 12L15 5"/>
                </svg>
            </button>
        </div>
        <ul class="mt-8">
            <li class="relative">
                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </x-jet-nav-link>
            </li>
            @can('viewAny', \App\Models\User::class)
                <li class="relative">
                    <x-jet-nav-link href="{{ route('staff') }}" :active="request()->routeIs('staff')">
                        <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M17 20H22V18C22 16.3431 20.6569 15 19 15C18.0444 15 17.1931 15.4468 16.6438 16.1429M17 20H7M17 20V18C17 17.3438 16.8736 16.717 16.6438 16.1429M7 20H2V18C2 16.3431 3.34315 15 5 15C5.95561 15 6.80686 15.4468 7.35625 16.1429M7 20V18C7 17.3438 7.12642 16.717 7.35625 16.1429M7.35625 16.1429C8.0935 14.301 9.89482 13 12 13C14.1052 13 15.9065 14.301 16.6438 16.1429M15 7C15 8.65685 13.6569 10 12 10C10.3431 10 9 8.65685 9 7C9 5.34315 10.3431 4 12 4C13.6569 4 15 5.34315 15 7ZM21 10C21 11.1046 20.1046 12 19 12C17.8954 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8C20.1046 8 21 8.89543 21 10ZM7 10C7 11.1046 6.10457 12 5 12C3.89543 12 3 11.1046 3 10C3 8.89543 3.89543 8 5 8C6.10457 8 7 8.89543 7 10Z" />
                        </svg>
                        {{ __('Staff') }}
                    </x-jet-nav-link>
                </li>
            @endcan
            <li class="relative">
                <x-jet-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    {{ __('Categories') }}
                </x-jet-nav-link>
            </li>
            <li class="relative">
                <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 11V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V11M5 9H19L20 21H4L5 9Z" />
                    </svg>
                    {{ __('Products') }}
                </x-jet-nav-link>
            </li>
            @can('viewAny', \App\Models\User::class)
                <li class="relative">
                    <x-jet-nav-link href="{{ route('inventories') }}" :active="request()->routeIs('inventories')">
                        <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        {{ __('Inventories') }}
                    </x-jet-nav-link>
                </li>
            @endcan
            <li class="relative">
                <x-jet-nav-link href="{{ route('sales.register') }}" :active="request()->routeIs('sales.register')">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    {{ __('Cash Register') }}
                </x-jet-nav-link>
            </li>
            <li class="relative">
                <x-jet-nav-link href="{{ route('sales.sales') }}" :active="request()->routeIs('sales.sales')">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 17V15M12 17V13M15 17V11M17 21H7C5.89543 21 5 20.1046 5 19V5C5 3.89543 5.89543 3 7 3H12.5858C12.851 3 13.1054 3.10536 13.2929 3.29289L18.7071 8.70711C18.8946 8.89464 19 9.149 19 9.41421V19C19 20.1046 18.1046 21 17 21Z" />
                    </svg>
                    {{ __('Sales Reports') }}
                </x-jet-nav-link>
            </li>
        </ul>
    </div>
</nav>
