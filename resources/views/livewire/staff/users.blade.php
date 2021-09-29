<div>
    <div class="flex justify-between items-center h-12 px-4 sm:px-0">
        <div class="text-2xl sm:text-3xl font-semibold text-purple-700 dark:text-gray-300">{{ __('Staff') }}</div>
        @can('create', \App\Models\User::class)
            <a href="{{ route('create-user') }}" class="flex items-center px-2 py-1 bg-purple-600 border border-transparent rounded-md font-semibold text-md text-white tracking-widest shadow-md hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:shadow-outline-purple transition ease-in-out duration-150">
                <div class="mr-2">
                {{ __('New Staff') }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        @endcan
    </div>

    <div class="flex justify-between w-full mt-4">
        <div class="w-full p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-md sm:rounded-lg">
            <div class="text-sm text-gray-700 dark:text-gray-400">
                {{ __('Total Staff:') }}
            </div>
            <div class="ml-2 pt-3 text-3xl text-purple-700 dark:text-gray-200">
                {{ $total_users_count }}
            </div>
        </div>
        @foreach ($roles as $role)
            <div class="w-full p-6 ml-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-md sm:rounded-lg">
                <div class="text-sm text-gray-700 dark:text-gray-400">
                    {{ $role->title }}
                </div>
                <div class="ml-2 pt-3 text-3xl text-purple-600 dark:text-gray-200">
                    {{ $role->users_count }}
                </div>
            </div>
            
        @endforeach
    </div>

    <div class="mt-8 text-lg sm:text-xl font-semibold text-purple-700 dark:text-gray-300">
        {{ __('Current Staff') }}
        <span wire:loading class="animate-pulse z-0">
            {{ __('loading...') }}
        </span>
    </div>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-1">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-100 dark:border-gray-800 sm:rounded-lg">
                <div class="flex justify-between min-w-full px-6 py-4 bg-white dark:bg-gray-800">
                    <div class="relative z-0 flex items-center w-full max-w-xl focus-within:text-purple-700">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input wire:model.debounce.350ms="search" class="w-full pl-8 text-sm text-gray-600 dark:text-gray-200 font-semibold placeholder-gray-500 bg-gray-200 border-0 border-gray-200 dark:bg-gray-900 rounded-full focus:placeholder-gray-500 focus:bg-gray-100 focus:border-purple-700 focus:outline-none form-input" type="text" placeholder="Search user..." aria-label="Search" />
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
                                    <div wire:click="selectFilterUsers({{ 0 }})" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ __('All') }}
                                    </div>
                                    @foreach ($roles as $role)
                                        <div wire:click="selectFilterUsers({{ $role->id }})" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            {{ $role->title }}
                                        </div>
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    @if ($users->isNotEmpty())
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                Registered On
                            </th>
                            @can('viewAny', \App\Models\User::class)
                                <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 tracking-wider">
                                    Actions
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300 font-semibold">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center text-gray-300">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if ($user->profile_photo_path)
                                                    <img class="h-10 w-10 rounded-full" src="{{ url('storage/'.$user->profile_photo_path) }}" alt="">
                                                @else
                                                    <x-no-image name-string="{{ $user->name }}" :height="10" :width="10" />
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="flex text-sm font-semibold text-gray-800 dark:text-gray-300">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-sm text-gray-700 dark:text-gray-400">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        @if(Cache::has('user-is-online-'.$user->id))
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 dark:bg-green-500 text-green-800 dark:text-gray-800">
                                                {{ __('Online') }}
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-300 dark:bg-gray-400 text-gray-700 dark:text-gray-800">
                                                {{ __('Offline') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ $user->role->title }}
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">
                                        {{ $user->created_at }}
                                    </td>
                                    @can('viewAny', \App\Models\User::class)
                                        <td class="px-6 py-2 whitespace-nowrap flex justify-center">
                                            @can('update', $user)
                                                @livewire('staff.edit', ['user' => $user->id], key('user-edit-'.$user->id))
                                            @endcan
                                            @can('delete', $user)
                                                @livewire('staff.delete', ['user' => $user->id], key('user-deletion-'.$user->id))
                                            @endcan
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @else
                            <div class="text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 text-md text-center align-middle overflow-y-auto py-4">
                                <div class="flex justify-center">
                                    <svg class="w-16 h-16" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17 20H22V18C22 16.3431 20.6569 15 19 15C18.0444 15 17.1931 15.4468 16.6438 16.1429M17 20H7M17 20V18C17 17.3438 16.8736 16.717 16.6438 16.1429M7 20H2V18C2 16.3431 3.34315 15 5 15C5.95561 15 6.80686 15.4468 7.35625 16.1429M7 20V18C7 17.3438 7.12642 16.717 7.35625 16.1429M7.35625 16.1429C8.0935 14.301 9.89482 13 12 13C14.1052 13 15.9065 14.301 16.6438 16.1429M15 7C15 8.65685 13.6569 10 12 10C10.3431 10 9 8.65685 9 7C9 5.34315 10.3431 4 12 4C13.6569 4 15 5.34315 15 7ZM21 10C21 11.1046 20.1046 12 19 12C17.8954 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8C20.1046 8 21 8.89543 21 10ZM7 10C7 11.1046 6.10457 12 5 12C3.89543 12 3 11.1046 3 10C3 8.89543 3.89543 8 5 8C6.10457 8 7 8.89543 7 10Z" />
                                    </svg>
                                </div>
                                <div class="text-3xl">No Staff Found</div>
                            </div>
                        @endif
                    </tbody>
                </table>
                <div class="min-w-full py-3 px-6 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <div class="livewire-pagination">
                        {{ $users->links('components.custom-pagination-links-view') }}
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
