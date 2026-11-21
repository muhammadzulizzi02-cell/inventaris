
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Barang</h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Tambah Barang
            </h6>
        </div>

        <div class="card-body">

            <form action="{{ url('/admin/barang/simpan') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label>Kode Barang</label>
                    <input type="text"
                           name="code"
                           class="form-control"
                           placeholder="Masukkan kode barang"
                           value="{{ old('code') }}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Barang</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama barang"
                           value="{{ old('nama') }}"
                           required>
                </div>

                <div class="form-group mb-3">
                    <label>Stok</label>
                    <input type="number"
                           name="stok"
                           class="form-control"
                           placeholder="Masukkan jumlah stok"
                           value="{{ old('stok') }}"
                           min="0"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ url('/admin/barang') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
