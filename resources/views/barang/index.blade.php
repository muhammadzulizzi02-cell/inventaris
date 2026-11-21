
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>

    <a href="/admin/barang/tambah" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Barang
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Barang
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <a href="/admin/barang/edit/{{ $item->id }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="/admin/barang/delete/{{ $item->id }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada data barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

            {{ $data->links() }}

        </div>
    </div>

</div>

@endsection
