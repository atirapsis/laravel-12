<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        $per_page = $request->query('per_page', 5);
        $inventories = Inventory::all();
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventory.create');
    }
    public function store(Request $request)
    {
        Inventory::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('inventory.index');
    }
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }
    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'description' => $request->description,
        ]);

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
}
