<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="inputname" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" id="inputname" name="name" value="{{ old('name', $inventory->name) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror  
                        </div>

                        <div class="mb-4">
                            <label for="inputqty" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Qty</label>
                            <input type="number" id="inputqty" name="qty" min="1" value="{{ old('qty', $inventory->qty) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('qty')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror  
                        </div>

                        <div class="mb-4">
                            <label for="inputprice" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Price</label>
                            <input type="number" id="inputprice" name="price" step="0.01" value="{{ old('price', $inventory->price) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('price')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label for="inputdescription" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <input type="text" id="inputdescription" name="description" value="{{ old('description', $inventory->description) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror  
                        </div>

                        <button type="submit"
                            class="inline-block border border-white text-white py-2 px-4 rounded">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
