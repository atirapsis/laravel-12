<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form>
                        @csrf

                        <div class="mb-4">
                            <label for="inputname" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" id="inputname" name="name" value="{{ $inventory->name }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="inputqty" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Qty</label>
                            <input type="number" id="inputqty" name="qty" value="{{ $inventory->qty }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="inputprice" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                            <input type="number" id="inputprice" name="price" value="{{ $inventory->price }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>

                        <div class="mb-6">
                            <label for="inputdescription" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <input type="text" id="inputdescription" name="description" value="{{ $inventory->description }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white sm:text-sm">
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('inventory.edit', $inventory->id) }}"
                               class="inline-block border border-white text-white py-2 px-4 rounded">
                                Edit Item
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
