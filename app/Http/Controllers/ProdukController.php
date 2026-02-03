<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller {
    public function index() {
        $products = Produk::all(); // Mengambil data dari database
        return view('owner.produk', compact('products'));
    }

    public function store(Request $request) {
        Produk::create($request->all()); // Simpan data
        return redirect()->back()->with('success', 'Produk berhasil ditambah!');
    }

    public function scan(Request $request) {
    // Cari produk berdasarkan barcode yang diinput
    $produk = Produk::where('barcode', $request->barcode)->first();

    if ($produk) {
        // Jika ketemu, kirim pesan sukses beserta nama dan stoknya
        return redirect()->back()->with('success', "Produk: {$produk->nama_produk} | Harga: Rp " . number_format($produk->harga_produk) . " | Stok: {$produk->stok_produk}");
    } else {
        // Jika tidak ketemu
        return redirect()->back()->with('error', "Barcode {$request->barcode} tidak terdaftar di sistem!");
    }
}
}