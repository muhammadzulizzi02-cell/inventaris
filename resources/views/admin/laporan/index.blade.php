
@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 text-gray-800 font-weight-bold">
                Laporan Barang
            </h1>
            <p class="text-muted">
                Daftar seluruh data barang inventaris.
            </p>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Inventaris Barang
            </h6>

            <div>
                <a href="{{ url('/admin/laporan/cetak') }}"
                   target="_blank"
                   class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf"></i>
                    Cetak PDF
                </a>

                <a href="{{ url('/admin/laporan/excel') }}"
                   class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel"></i>
                    Export Excel
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover"
                       width="100%" cellspacing="0">

                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->code }}</td>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->stok }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Belum ada data barang.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="text-muted mt-3">
                Total data barang: <strong>{{ $data->count() }}</strong>
            </div>
        </div>
    </div>

</div>

@endsection
