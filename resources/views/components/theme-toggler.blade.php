<div class="flex justify-end items-center px-4 py-2">
    <label for="toggleTheme" class="w-6 h-6 flex justify-center items-center text-gray-600 dark:text-gray-200 rounded-full cursor-pointer transform hover:scale-110 transition duration-500 ease-in-out">
        <template x-if="darkMode">
            <span class="text-sm dark:text-gray-50 dark:hover:text-white">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </template>
        {{--<div class="toggle-dot bg-white border-2 border-transparent dark:border-2 dark:border-gray-400 w-4 h-4 rounded-full transform duration-300 ease-in-out dark:translate-x-3"></div>--}}
        <template x-if="!darkMode">
            <span class="text-sm text-purple-600">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </span>
        </template>
    </label>
    <input id="toggleTheme" type="checkbox" class="hidden" :value="darkMode" @change="darkMode = !darkMode" />
</div>