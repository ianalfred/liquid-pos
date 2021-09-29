<div>
    <button wire:click="confirmUserDeletion" class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-5 h-5 text-red-600 hover:text-red-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </button>

    <x-jet-confirmation-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete Staff') }}
        </x-slot>

        <x-slot name="content">
            <div class="max-w-xl text-sm text-gray-600 dark:text-gray-300 break-words">
                {{ __('Once this account is deleted, all of its resources and data will be permanently deleted.') }}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="deleteUser">{{ __('Delete') }}</span>
                <span wire:loading wire:target="deleteUser">
                    {{ __('Deleting...') }}
                </span>
            </x-jet-danger-button>
        </x-slot>

    </x-jet-confirmation-modal>
</div>
