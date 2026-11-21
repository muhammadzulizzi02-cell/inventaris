
@extends('layouts.master')

@section('content')

<style>
    .barang-page {
        padding-bottom: 25px;
    }

    .barang-header {
        background: linear-gradient(120deg, #172554, #2563eb);
        color: white;
        padding: 25px;
        border-radius: 14px;
        margin-bottom: 25px;
        box-shadow: 0 5px 18px rgba(0,0,0,.08);
    }

    .barang-header h1 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .barang-header p {
        margin: 0;
        opacity: .85;
    }

    .barang-card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 4px 18px rgba(0,0,0,.06);
        overflow: hidden;
    }

    .barang-card .card-header {
        background: white;
        padding: 20px;
        border-bottom: 1px solid #edf0f5;
    }

    .barang-card .card-body {
        padding: 22px;
    }

    .barang-table thead th {
        background: #f3f6fb;
        color: #475569;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
        border: 0;
        padding: 15px;
    }

    .barang-table tbody td {
        padding: 15px;
        vertical-align: middle;
        color: #334155;
    }

    .barang-table tbody tr:hover {
        background: #f8faff;
    }

    .kode-badge {
        background: #eaf1ff;
        color: #2456b8;
        padding: 6px 10px;
        border-radius: 6px;
        font-weight: 600;
    }

    .stok-badge {
        background: #e8f7ef;
        color: #16834a;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
    }

    .btn-tambah {
        background: white;
        color: #2456b8;
        border: none;
        padding: 10px 17px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
    }

    .btn-tambah:hover {
        background: #edf3ff;
        color: #173d8a;
        text-decoration: none;
    }

    .btn-aksi {
        border-radius: 7px;
        padding: 7px 11px;
        font-size: 12px;
    }

    .empty-data {
        padding: 35px !important;
        color: #94a3b8 !important;
    }

    .pagination {
        margin-bottom: 0;
    }
</style>

<div class="container-fluid barang-page">

    <!-- Header -->
    <div class="barang-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1>Data Barang</h1>
                <p>Kelola data dan stok barang inventaris Anda.</p>
            </div>

            <a href="{{ url('/admin/barang/tambah') }}"
               class="btn-tambah mt-3 mt-md-0">
                <i class="fas fa-plus mr-1"></i>
                Tambah Barang
            </a>
        </div>
    </div>

    <!-- Tabel Barang -->
    <div class="card barang-card">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="font-weight-bold text-primary mb-1">
                    <i class="fas fa-boxes mr-2"></i>
                    Daftar Inventaris
                </h6>
                <small class="text-muted">
                    Daftar seluruh barang yang tersimpan
                </small>
            </div>

            <div class="mt-3 mt-md-0">
                <input type="text"
                       id="cariBarang"
                       class="form-control"
                       placeholder="Cari barang..."
                       style="min-width:220px;">
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table barang-table table-hover" id="tabelBarang">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td>{{ $data->firstItem() + $loop->index }}</td>

                            <td>
                                <span class="kode-badge">
                                    {{ $item->code }}
                                </span>
                            </td>

                            <td class="font-weight-bold">
                                {{ $item->nama }}
                            </td>

                            <td>
                                <span class="stok-badge">
                                    {{ $item->stok }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ url('/admin/barang/edit/'.$item->id) }}"
                                   class="btn btn-warning btn-aksi"
                                   title="Edit barang">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ url('/admin/barang/delete/'.$item->id) }}"
                                      method="GET"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus barang ini?')">

                                    <button type="submit"
                                            class="btn btn-danger btn-aksi"
                                            title="Hapus barang">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="5" class="text-center empty-data">
                                <i class="fas fa-box-open fa-3x mb-3"></i>
                                <p class="mb-0">Belum ada data barang.</p>
                                <small>Silakan tambahkan barang terlebih dahulu.</small>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
                <small class="text-muted mb-2">
                    Menampilkan {{ $data->count() }} dari {{ $data->total() }} barang
                </small>

                {{ $data->links() }}
            </div>

        </div>
    </div>

</div>

<script>
    document.getElementById('cariBarang').addEventListener('keyup', function () {
        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll('#tabelBarang tbody tr');

        rows.forEach(function (row) {
            let isi = row.innerText.toLowerCase();
            row.style.display = isi.includes(keyword) ? '' : 'none';
        });
    });
</script>

@endsection
