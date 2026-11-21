<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // =====================================
    // DASHBOARD
    // =====================================
    public function admin()
    {
        return view('admin.beranda');
    }


    // =====================================
    // MENAMPILKAN DATA BARANG
    // =====================================
    public function barang()
    {
        $data = Barang::paginate(10);

        return view('admin.barang.index', compact('data'));
    }


    // =====================================
    // MENAMPILKAN FORM TAMBAH BARANG
    // =====================================
    public function tambah_barang()
    {
        return view('admin.barang.tambah');
    }


    // =====================================
    // MENYIMPAN BARANG BARU
    // =====================================
    public function simpan_barang(Request $req)
    {
        $req->validate([
            'code' => 'required|max:50',
            'nama' => 'required|max:50',
            'stok' => 'required|integer|min:0',
        ]);

        $barang = new Barang();

        $barang->code = $req->code;
        $barang->nama = $req->nama;
        $barang->stok = $req->stok;

        $barang->save();

        return redirect('/admin/barang')
            ->with('success', 'Data barang berhasil ditambahkan!');
    }


    // =====================================
    // MENAMPILKAN FORM EDIT BARANG
    // =====================================
    public function edit_barang(int $id)
    {
        $data = Barang::findOrFail($id);

        return view('admin.barang.edit', compact('data'));
    }


    // =====================================
    // MEMPERBARUI DATA BARANG
    // =====================================
    public function update_barang(Request $req, int $id)
    {
        $req->validate([
            'code' => 'required|max:50',
            'nama' => 'required|max:50',
            'stok' => 'required|integer|min:0',
        ]);

        $data = Barang::findOrFail($id);

        $data->code = $req->code;
        $data->nama = $req->nama;
        $data->stok = $req->stok;

        $data->save();

        return redirect('/admin/barang')
            ->with('success', 'Data barang berhasil diperbarui!');
    }


    // =====================================
    // MENGHAPUS DATA BARANG
    // =====================================
    public function delete_barang(int $id)
    {
        $data = Barang::findOrFail($id);

        $data->delete();

        return redirect('/admin/barang')
            ->with('success', 'Data barang berhasil dihapus!');
    }
}
