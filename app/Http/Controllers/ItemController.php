<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', session('user_id'))->with('transactions')->get();
        return view('owner.items.index', compact('items'));
    }

    public function indexPeminjam()
    {
        $items = Item::whereDoesntHave('transactions', function ($query) {
            $query->where('status', 'pending');
        })->with('user')->get();
        return view('peminjam.items.index', compact('items'));
    }

    public function create()
    {
        return view('owner.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'password' => 'nullable|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            Item::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => session('user_id'),
                'password' => $request->password ?? '',
            ]);
        });

        return redirect()->route('owner.items')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('owner.items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'password' => 'nullable|string|max:255',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'password' => $request->password ?? $item->password,
        ]);

        return redirect()->route('owner.items')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('owner.items')->with('success', 'Barang berhasil dihapus.');
    }
}