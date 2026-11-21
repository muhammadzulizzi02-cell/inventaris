
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris Barang</title>

    <style>
        @page {
            margin: 35px 38px 65px 38px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #263449;
            font-size: 10px;
        }

        .kop {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 4px solid #233d62;
            padding-bottom: 12px;
            margin-bottom: 24px;
        }

        .logo {
            background: #233d62;
            color: #ffffff;
            width: 55px;
            height: 55px;
            text-align: center;
            vertical-align: middle;
            font-size: 20px;
            font-weight: bold;
        }

        .kop-title {
            padding-left: 12px;
            vertical-align: middle;
        }

        .kop-title h2 {
            margin: 0;
            color: #233d62;
            font-size: 19px;
            letter-spacing: 1px;
        }

        .kop-title p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 9px;
        }

        .kop-right {
            text-align: right;
            vertical-align: middle;
            color: #b18a45;
            font-size: 10px;
            font-weight: bold;
        }

        .judul {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul h1 {
            color: #233d62;
            font-size: 17px;
            margin: 0 0 6px;
        }

        .judul p {
            color: #718096;
            margin: 0;
            font-size: 9px;
        }

        .info {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: collapse;
        }

        .info td {
            padding: 7px 9px;
            background: #f1f5f9;
            border: 1px solid #e0e6ed;
        }

        .data {
            width: 100%;
            border-collapse: collapse;
        }

        .data th {
            background: #233d62;
            color: #ffffff;
            padding: 10px 7px;
            border: 1px solid #233d62;
            font-size: 9px;
        }

        .data td {
            padding: 9px 7px;
            border: 1px solid #dce3ec;
            font-size: 9px;
        }

        .data tr:nth-child(even) {
            background: #f3f6fa;
        }

        .center {
            text-align: center;
        }

        .total {
            width: 100%;
            margin-top: 16px;
            border-collapse: collapse;
        }

        .total td {
            padding: 10px;
            background: #edf2f8;
            border: 1px solid #dce3ec;
            font-weight: bold;
        }

        .signature {
            width: 100%;
            margin-top: 35px;
            border-collapse: collapse;
        }

        .signature td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            padding: 5px 15px;
        }

        .sign-space {
            height: 65px;
        }

        .sign-line {
            border-bottom: 1px solid #263449;
            width: 75%;
            margin: auto;
            padding-bottom: 5px;
        }

        .footer {
            position: fixed;
            bottom: -45px;
            left: 0;
            right: 0;
            border-top: 2px solid #233d62;
            padding-top: 8px;
            color: #64748b;
            font-size: 8px;
        }

        .footer table {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- HEADER / KOP LAPORAN -->
    <table class="kop">
        <tr>
            <td class="logo">INV</td>

            <td class="kop-title">
                <h2>SISTEM INVENTARIS</h2>
                <p>LAPORAN ADMINISTRASI DAN DATA BARANG</p>
                <p>Dokumen resmi rekapitulasi inventaris</p>
            </td>

            <td class="kop-right">
                LAPORAN BARANG
                <br>
                <span style="color:#64748b;font-weight:normal;">
                    DOKUMEN INVENTARIS
                </span>
            </td>
        </tr>
    </table>

    <!-- JUDUL -->
    <div class="judul">
        <h1>LAPORAN DATA BARANG</h1>
        <p>Rekapitulasi Data Persediaan Barang Inventaris</p>
    </div>

    <!-- INFORMASI -->
    <table class="info">
        <tr>
            <td width="50%">
                <strong>Jenis Laporan</strong><br>
                Data Inventaris Barang
            </td>

            <td width="50%">
                <strong>Tanggal Cetak</strong><br>
                {{ $tanggal->format('d F Y, H:i') }} WIB
            </td>
        </tr>
        <tr>
            <td>
                <strong>Jumlah Jenis Barang</strong><br>
                {{ $data->count() }} Barang
            </td>

            <td>
                <strong>Status Dokumen</strong><br>
                Laporan Sistem
            </td>
        </tr>
    </table>

    <!-- TABEL BARANG -->
    <table class="data">
        <thead>
            <tr>
                <th width="9%">NO</th>
                <th width="20%">KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th width="18%">STOK</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $barang)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>
                    <td class="center">{{ $barang->code }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td class="center">{{ number_format($barang->stok, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="center">
                        Belum terdapat data barang.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- RINGKASAN -->
    <table class="total">
        <tr>
            <td width="70%">TOTAL JENIS BARANG</td>
            <td class="center">{{ $data->count() }}</td>
        </tr>
        <tr>
            <td>TOTAL KESELURUHAN STOK</td>
            <td class="center">
                {{ number_format($data->sum('stok'), 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <!-- TANDA TANGAN -->
    <table class="signature">
        <tr>
            <td>
                Mengetahui,
                <br>
                Kepala Administrasi
                <div class="sign-space"></div>
                <div class="sign-line">
                    ( Muhammad Zul 'Izzi' )
                </div>
            </td>

            <td>
                {{ $tanggal->format('d F Y') }}
                <br>
                Petugas Inventaris
                <div class="sign-space"></div>
                <div class="sign-line">
                    ( ................................ )
                </div>
            </td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        <table>
            <tr>
                <td width="65%">
                    SISTEM INFORMASI INVENTARIS | LAPORAN DATA BARANG
                </td>
                <td align="right">
                    Dicetak: {{ $tanggal->format('d/m/Y') }}
                    &nbsp; | &nbsp;
                    Halaman <span class="page-number"></span>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
