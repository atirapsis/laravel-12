<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('inventory.create') }}"
                        class="inline-block border border-white text-white py-2 px-4 rounded">
                        Add New Inventory
                    </a>
                    <table class="min-w-full table-auto border-collapse mt-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">#</th>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Name</th>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Qty</th>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Price</th>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Description</th>
                                <th class="px-4 py-2 border-b dark:border-gray-700 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventories as $key => $inventory)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$key + 1}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->name}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->qty}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->price}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->description}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700 flex space-x-2">
                                    <a href="{{ route('inventory.edit', $inventory) }}" class="inline-block border border-white text-white py-2 px-4 rounded">Edit</a>
                                    <form method="post" action="{{ route('inventory.destroy', $inventory) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 inline-block border border-white text-white py-2 px-4 rounded">Delete</button>
                                    </form>
                                    <a href="{{ route('inventory.show', $inventory) }}" class="inline-block border border-white text-white py-2 px-4 rounded">Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
