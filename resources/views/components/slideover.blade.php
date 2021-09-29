{{--<div x-data="{usedKeyboard: false}"
    @keydown.window.tab="usedKeyboard = true"
    @click="$dispatch('open-menu', { open: true })"
    :class="{'focus:outline-none': !usedKeyboard}" 
    class="cursor-pointer inline-block py-2 transform hover:-translate-y-1 hover:scale-110 transition duration-500 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600  hover:text-blue-700" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.9998 12C14.9998 13.6569 13.6566 15 11.9998 15C10.3429 15 8.99976 13.6569 8.99976 12C8.99976 10.3431 10.3429 9 11.9998 9C13.6566 9 14.9998 10.3431 14.9998 12Z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.45801 12C3.73228 7.94288 7.52257 5 12.0002 5C16.4778 5 20.2681 7.94291 21.5424 12C20.2681 16.0571 16.4778 19 12.0002 19C7.52256 19 3.73226 16.0571 2.45801 12Z" />
    </svg>
</div>--}}

<section
    x-data="{
        open: @entangle($attributes->wire('model')).defer
    }"
    x-init="$watch('open', value => {
        value && this.$refs.closeButton.focus()
        this.toggleOverlay()
    },
    toggleOverlay() {
        document.body.classList[this.open ? 'add' : 'remove']('h-screen', 'overflow-hidden')
    })"
    x-on:close.stop="open = false"
    x-on:keydown.escape.window="open = false"
    x-show="open"
    x-cloak >
    <div
        x-show.transition.opacity.duration.500="open"
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50"></div>
    <div
        class="fixed z-50 transition duration-300 right-0 top-0 transform w-full max-w-sm h-screen text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 overflow-hidden shadow-lg"
        :class="{'translate-x-full': !open}">
        <button
            x-on:click="open = false"
            class="fixed top-0 right-0 mr-4 mt-2 z-50">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <div class="p-6 px-6 w-full absolute top-0 h-full overflow-y-auto">
            <div class="text-gray-800 dark:text-gray-200 font-semibold text-xl">Member Detail</div>
        </div>
    </div>
</section>