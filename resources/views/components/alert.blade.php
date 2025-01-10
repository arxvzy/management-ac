<div x-data="{ show: true }" x-show="show"
    class="flex items-center p-4 mb-4 text-green-800  bg-green-200 rounded-lg dark:text-green-400 dark:bg-gray-800 "
    role="alert">
    <x-heroicon-o-check-circle class="flex-shrink-0 w-5 h-5" aria-hidden="true" />
    <div class="ms-3 text-sm font-medium">
        Berhasil Menambahkan {{ $slot }}
    </div>
    <button @click="show = false"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-50 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <x-heroicon-c-x-circle class="w-5 h-5" aria-hidden="true" />
    </button>
</div>
