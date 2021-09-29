@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg text-purple-700 dark:text-gray-100">
            {{ $title }}
        </div>

        <div class="mt-4 text-gray-800 dark:text-gray-200">
            {{ $content }}
        </div>
    </div>

    <div class="flex justify-between px-6 py-4 dark:border-t dark:border-gray-500 bg-gray-100 dark:bg-gray-800">
        {{ $footer }}
    </div>
</x-jet-modal>
