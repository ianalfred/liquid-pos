<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-purple-600 dark:bg-purple-700 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-purple-700 dark:hover:bg-purple-800 active:bg-purple-900 focus:outline-none focus:border-purple-700 disabled:opacity-25 dark:disabled:opacity-75 transition']) }}>
    {{ $slot }}
</button>
