<?php
namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function indexAdmin()
    {
        $transactions = Transaction::with(['item', 'peminjam', 'owner'])->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function indexPeminjam()
    {
        $transactions = Transaction::with(['item', 'peminjam', 'owner'])
            ->where('peminjam_id', session('user_id'))
            ->get(); // Hapus filter status untuk tampilkan semua
        return view('peminjam.transactions.index', compact('transactions'));
    }

    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);
        return view('peminjam.transactions.create', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:borrow_date',
            'password' => 'required|string',
        ]);

        $item = Item::findOrFail($request->item_id);

        // Validasi password
        if ($item->password && $request->password !== $item->password) {
            return back()->withErrors(['password' => 'Password barang salah.']);
        }

        $transaction = DB::transaction(function () use ($request, $item) {
            return Transaction::create([
                'item_id' => $request->item_id,
                'peminjam_id' => session('user_id'),
                'owner_id' => $item->user_id,
                'borrow_date' => $request->borrow_date,
                'return_date' => $request->return_date,
                'status' => 'pending',  
            ]);
        });
        

        return redirect()->route('peminjam.transactions')->with('success', 'Permintaan peminjaman berhasil dikirim.');
    }

    public function returnItem($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        if (session('role') !== 'owner' || $transaction->owner_id !== session('user_id')) {
            return redirect()->route('owner.items')->with('error', 'Anda tidak berwenang.');
        }
        $transaction->update(['status' => 'returned']);
        return redirect()->route('owner.items')->with('success', 'Barang telah dikembalikan.');
    }
}