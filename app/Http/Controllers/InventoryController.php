<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 5);
        $inventories = Inventory::paginate($per_page);
        $deletedInventories = Inventory::onlyTrashed()->paginate($per_page);

        return view('inventory.index', compact('inventories', 'deletedInventories'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|min:5|max:255'
        ], [
            'name.required' => 'Item name is required.',
            'name.min' => 'Item name must be at least 5 characters.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 5 characters.',
        ]);

        $validated_data['user_id'] = Auth::id();
        Inventory::create($validated_data);
        return redirect()->route('inventory.index');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string|min:5|max:255',
        ], [
            'name.required' => 'Item name is required.',
            'name.min' => 'Item name must be at least 5 characters.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 5 characters.',
        ]);

        $inventory->update($validated_data);
        return redirect()->route('inventory.index');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }

    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    public function restore($id)
    {
        $inventory = Inventory::withTrashed()->findOrFail($id);
        $inventory->restore();

        return redirect()->route('inventory.index');
    }

    public function forceDelete($id)
    {
    $inventory = Inventory::withTrashed()->findOrFail($id);
    $inventory->forceDelete();

    return redirect()->route('inventory.index')->with('success');
    }

}
