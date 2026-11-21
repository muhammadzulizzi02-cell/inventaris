
@extends('layouts.master')

@section('content')

<style>
    .dashboard-page {
        color: #243854;
    }

    .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }

    .page-heading h1 {
        font-size: 26px;
        font-weight: 900;
        color: #172b4d;
        margin-bottom: 5px;
    }

    .page-heading p {
        color: #91a0b5;
        font-size: 13px;
        margin: 0;
    }

    .date-label {
        background: white;
        padding: 11px 16px;
        border-radius: 10px;
        border: 1px solid #edf0f5;
        color: #66758c;
        font-size: 12px;
        font-weight: 700;
    }

    /* STATISTIC CARD */
    .stat-card {
        position: relative;
        border: none;
        border-radius: 15px;
        padding: 23px;
        color: white;
        min-height: 155px;
        overflow: hidden;
        box-shadow: 0 7px 20px rgba(20, 40, 80, .08);
        transition: .3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-card .stat-title {
        font-size: 13px;
        font-weight: 700;
        opacity: .9;
        margin-bottom: 12px;
    }

    .stat-card .stat-value {
        font-size: 31px;
        font-weight: 900;
        margin: 0;
    }

    .stat-card .stat-icon {
        position: absolute;
        right: 20px;
        top: 25px;
        width: 48px;
        height: 48px;
        background: rgba(255,255,255,.2);
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .stat-card small {
        display: block;
        margin-top: 13px;
        font-size: 11px;
        opacity: .85;
    }

    .stat-blue {
        background: linear-gradient(135deg, #438bff, #1761d1);
    }

    .stat-green {
        background: linear-gradient(135deg, #36c994, #149b70);
    }

    .stat-purple {
        background: linear-gradient(135deg, #9b7af5, #6945d8);
    }

    .stat-orange {
        background: linear-gradient(135deg, #ffbd55, #f28b24);
    }

    /* GENERAL PANEL */
    .dashboard-panel {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #edf0f5;
        box-shadow: 0 5px 20px rgba(20,40,80,.04);
        height: 100%;
    }

    .panel-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
    }

    .panel-heading h5 {
        color: #243854;
        font-weight: 900;
        font-size: 16px;
        margin: 0;
    }

    .panel-heading p {
        font-size: 11px;
        color: #9aa8ba;
        margin: 5px 0 0;
    }

    .chart-container {
        position: relative;
        height: 280px;
        width: 100%;
    }

    /* WELCOME PANEL */
    .welcome-panel {
        background: linear-gradient(120deg, #142d50, #236bc1);
        color: white;
        border-radius: 17px;
        padding: 30px;
        min-height: 230px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .welcome-panel h2 {
        font-size: 25px;
        font-weight: 900;
        margin-bottom: 12px;
    }

    .welcome-panel p {
        color: #d9e9ff;
        font-size: 13px;
        line-height: 1.8;
        max-width: 420px;
        margin-bottom: 18px;
    }

    .welcome-panel .welcome-icon {
        font-size: 115px;
        color: rgba(255,255,255,.18);
        margin-right: 35px;
    }

    .welcome-tag {
        display: inline-block;
        background: rgba(255,255,255,.16);
        border: 1px solid rgba(255,255,255,.2);
        padding: 9px 17px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
    }

    /* TABLE */
    .activity-table {
        width: 100%;
        border-collapse: collapse;
    }

    .activity-table th {
        background: #f7f9fc;
        color: #8392a9;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 14px;
        border: none;
    }

    .activity-table td {
        padding: 16px 14px;
        font-size: 12px;
        color: #52647d;
        border-bottom: 1px solid #f0f2f6;
    }

    .activity-table tr:last-child td {
        border-bottom: none;
    }

    .activity-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin-right: 8px;
    }

    .icon-in {
        color: #16a477;
        background: #e4f8f0;
    }

    .icon-out {
        color: #e58b31;
        background: #fff2e1;
    }

    .status-badge {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
    }

    .status-success {
        background: #e4f8f0;
        color: #16a477;
    }

    .status-warning {
        background: #fff2e1;
        color: #e58b31;
    }

    @media(max-width: 768px) {
        .page-heading {
            align-items: flex-start;
        }

        .page-heading h1 {
            font-size: 22px;
        }

        .date-label {
            display: none;
        }

        .welcome-panel {
            padding: 23px;
        }

        .welcome-panel h2 {
            font-size: 21px;
        }

        .welcome-panel .welcome-icon {
            font-size: 65px;
            margin-right: 0;
        }

        .dashboard-panel {
            padding: 17px;
        }

        .table-responsive {
            overflow-x: auto;
        }
    }
</style>


<div class="dashboard-page">

    <!-- HEADER -->
    <div class="page-heading">

        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang di halaman utama inventaris Anda.</p>
        </div>

        <div class="date-label">
            <i class="far fa-calendar-alt mr-2"></i>
            {{ date('d F Y') }}
        </div>

    </div>


    <!-- WELCOME -->
    <div class="welcome-panel">

        <div>
            <h2>Selamat Datang di Inventaris!</h2>

            <p>
                Pantau seluruh aktivitas persediaan barang,
                kelola data inventaris, dan pastikan semua
                kebutuhan operasional tercatat dengan baik.
            </p>

            <span class="welcome-tag">
                <i class="fas fa-check-circle mr-2"></i>
                Sistem Inventaris Aktif
            </span>
        </div>

        <div class="welcome-icon">
            <i class="fas fa-warehouse"></i>
        </div>

    </div>


    <!-- STATISTICS -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card stat-blue">

                <div class="stat-title">JUMLAH BARANG</div>

                <h2 class="stat-value">40,213</h2>

                <small>
                    <i class="fas fa-box mr-1"></i>
                    Total persediaan barang
                </small>

                <div class="stat-icon">
                    <i class="fas fa-boxes"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card stat-green">

                <div class="stat-title">BARANG MASUK</div>

                <h2 class="stat-value">534</h2>

                <small>
                    <i class="fas fa-arrow-down mr-1"></i>
                    Total barang masuk
                </small>

                <div class="stat-icon">
                    <i class="fas fa-dolly"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card stat-purple">

                <div class="stat-title">BARANG KELUAR</div>

                <h2 class="stat-value">213</h2>

                <small>
                    <i class="fas fa-arrow-up mr-1"></i>
                    Total barang keluar
                </small>

                <div class="stat-icon">
                    <i class="fas fa-dolly-flatbed"></i>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card stat-orange">

                <div class="stat-title">JUMLAH PEGAWAI</div>

                <h2 class="stat-value">18</h2>

                <small>
                    <i class="fas fa-users mr-1"></i>
                    Total pegawai
                </small>

                <div class="stat-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

            </div>
        </div>

    </div>


    <!-- CHART -->
    <div class="row mb-4">

        <div class="col-lg-8 mb-4">

            <div class="dashboard-panel">

                <div class="panel-heading">
                    <div>
                        <h5>Grafik Aktivitas Inventaris</h5>
                        <p>Contoh visualisasi barang masuk dan keluar</p>
                    </div>

                    <i class="fas fa-chart-line text-primary fa-lg"></i>
                </div>

                <div class="chart-container">
                    <canvas id="inventoryChart"></canvas>
                </div>

            </div>

        </div>


        <div class="col-lg-4 mb-4">

            <div class="dashboard-panel">

                <div class="panel-heading">
                    <div>
                        <h5>Ringkasan Inventaris</h5>
                        <p>Perbandingan aktivitas</p>
                    </div>

                    <i class="fas fa-chart-pie text-primary fa-lg"></i>
                </div>

                <div class="chart-container">
                    <canvas id="inventoryPie"></canvas>
                </div>

            </div>

        </div>

    </div>


    <!-- ACTIVITY TABLE -->
    <div class="row mb-4">

        <div class="col-12">

            <div class="dashboard-panel">

                <div class="panel-heading">

                    <div>
                        <h5>Aktivitas Inventaris</h5>
                        <p>Contoh tampilan riwayat transaksi</p>
                    </div>

                    <i class="fas fa-history text-primary fa-lg"></i>

                </div>

                <div class="table-responsive">

                    <table class="activity-table">

                        <thead>
                            <tr>
                                <th>Aktivitas</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <span class="activity-icon icon-in">
                                        <i class="fas fa-arrow-down"></i>
                                    </span>
                                    Barang Masuk
                                </td>

                                <td>Penambahan persediaan</td>

                                <td>534</td>

                                <td>
                                    <span class="status-badge status-success">
                                        Tercatat
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span class="activity-icon icon-out">
                                        <i class="fas fa-arrow-up"></i>
                                    </span>
                                    Barang Keluar
                                </td>

                                <td>Pengeluaran persediaan</td>

                                <td>213</td>

                                <td>
                                    <span class="status-badge status-warning">
                                        Diproses
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- CHART JAVASCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof Chart === 'undefined') {
        return;
    }

    // Grafik batang
    var ctx = document.getElementById('inventoryChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni'
                ],

                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: [80, 120, 100, 150, 130, 180],
                        backgroundColor: '#2878e8',
                        borderRadius: 6
                    },
                    {
                        label: 'Barang Keluar',
                        data: [50, 90, 75, 110, 85, 120],
                        backgroundColor: '#36c994',
                        borderRadius: 6
                    }
                ]
            },

            options: {
                maintainAspectRatio: false,
                responsive: true,

                legend: {
                    position: 'bottom'
                },

                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            color: '#f0f2f6'
                        }
                    }],

                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    }


    // Grafik lingkaran
    var pie = document.getElementById('inventoryPie');

    if (pie) {
        new Chart(pie, {
            type: 'doughnut',

            data: {
                labels: ['Barang Masuk', 'Barang Keluar'],

                datasets: [{
                    data: [534, 213],
                    backgroundColor: [
                        '#36c994',
                        '#9570f7'
                    ],
                    borderWidth: 0
                }]
            },

            options: {
                maintainAspectRatio: false,
                responsive: true,
                cutoutPercentage: 72,

                legend: {
                    position: 'bottom'
                }
            }
        });
    }

});
</script>

@endsection
