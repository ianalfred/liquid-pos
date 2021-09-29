<div>
    <div wire:click="confirmUserEdit" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600  hover:text-purple-700 " aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </div>

    <!-- Edit User Info Modal -->
    <x-jet-dialog-modal wire:model="confirmingUserEdit">
        <x-slot name="title">
            {{ __('Edit Staff Info') }}
        </x-slot>

        <x-slot name="content">
            
            <div>
                <x-jet-label for="name" value="{{ __('Full Name') }}" />
                <x-jet-input wire:model.defer="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model.defer="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4 relative">
                <x-jet-label for="role_id" value="{{ __('Register As') }}" />
                <x-select>
                    <x-slot name="title">
                        {{ $selectedRoleName }}
                    </x-slot>
                    <x-slot name="options">
                        @foreach ($roles as $role)
                            <li wire:click="selectingRole({{ $role->id }}, '{{$role->title}}')" id="listbox-item-0" role="option" class="text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer select-none relative py-2 pl-3 pr-9">
                                <div class="flex items-center">
                                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                    <span class="{{ $selectedRoleId == $role->id ? 'block font-semibold truncate' : 'block font-normal truncate' }}">
                                        {{ $role->title }}
                                    </span>
                                </div>
                        
                                @if ($selectedRoleId == $role->id)
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
                <x-jet-input-error for="role_id" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input wire:model.defer="password" id="password" class="block mt-1 w-full" type="password" name="password" placeholder="(Leave empty if not changing)" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserEdit')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="editUser" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="editUser">{{ __('Update') }}</span>
                <span wire:loading wire:target="editUser">
                    {{ __('Updating...') }}
                </span>
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
