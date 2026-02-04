<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::all();

        // Hitung total modal (harga_modal * stok)
        $total_modal = $products->sum(function ($p) {
            return $p->harga_modal * $p->stok_produk;
        });

        // Hitung potensi omzet (harga_produk * stok)
        $total_jual = $products->sum(function ($p) {
            return $p->harga_produk * $p->stok_produk;
        });

        return view('owner.produk', compact('products', 'total_modal', 'total_jual'));
    }

    public function store(Request $request)
    {
        Produk::create($request->all()); // Simpan data
        return redirect()->back()->with('success', 'Produk berhasil ditambah!');
    }

    public function scan(Request $request)
    {
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
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->back()->with('success', 'Data produk berhasil diperbarui!');
    }
    public function showLogin()
    {
        return view('owner.login');
    }

    public function auth(Request $request)
    {
        // Cek apakah ID dan Pass sesuai dengan permintaan Anda: 0wn312
        if ($request->id_owner == '0wn312' && $request->password_owner == '0wn312') {
            $request->session()->put('is_owner', true);
            return redirect()->route('produk.index');
        }

        return redirect()->back()->with('error', 'ID atau Password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_owner');
        return redirect()->route('home.index');
    }
}
