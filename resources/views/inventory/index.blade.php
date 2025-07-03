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
                    <h3 class="text-lg font-bold mt-2 mb-2"> Inventories</h3>
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
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{($inventories->currentPage() - 1) * $inventories->perPage() + $key + 1}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->name}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->qty}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->price}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700">{{$inventory->description}}</td>
                                <td class="px-4 py-2 border-b dark:border-gray-700 flex space-x-2">
                                    <a href="{{ route('inventory.edit', $inventory) }}" class="inline-block border border-white text-white py-2 px-4 rounded">Edit</a>
                                    <form method="post" action="{{ route('inventory.destroy', $inventory) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-red-500 inline-block border border-white text-white py-2 px-4 rounded">Soft Delete</button>
                                    </form>
                                    <a href="{{ route('inventory.show', $inventory) }}" class="inline-block border border-white text-white py-2 px-4 rounded">Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-6">
                        {{ $inventories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Deleted Inventories</h3>

                    @if($deletedInventories->count() === 0)
                        <p class="text-gray-500">No deleted inventories found.</p>
                    @else
                        <table class="min-w-full table-auto border-collapse mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">#</th>
                                    <th class="px-4 py-2 border-b text-left">Name</th>
                                    <th class="px-4 py-2 border-b text-left">Qty</th>
                                    <th class="px-4 py-2 border-b text-left">Price</th>
                                    <th class="px-4 py-2 border-b text-left">Description</th>
                                    <th class="px-4 py-2 border-b text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deletedInventories as $key => $inventory)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="px-4 py-2 border-b">{{ $key + 1 }}</td>
                                        <td class="px-4 py-2 border-b">{{ $inventory->name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $inventory->qty }}</td>
                                        <td class="px-4 py-2 border-b">{{ $inventory->price }}</td>
                                        <td class="px-4 py-2 border-b">{{ $inventory->description }}</td>
                                        <td class="px-4 py-2 border-b flex space-x-2">
                                            <form action="{{ route('inventory.restore', $inventory->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-red-500 inline-block border border-white text-white py-2 px-4 rounded">Restore</button>
                                            </form>
                                            <form method="post" action="{{ route('inventory.forceDelete', $inventory->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Delete Forever</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
