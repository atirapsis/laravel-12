<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
                <a href="{{ route('inventory.index') }}"
                    class="inline-block border border-white text-white py-2 px-4 rounded">
                    Go to Index Page
                </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
