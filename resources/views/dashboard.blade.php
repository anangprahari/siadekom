@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Sistem Manajemen Aset
                    </div>
                    <h2 class="page-title">
                        Dashboard Aset
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex gap-2">
                        <a href="{{ route('asets.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <x-icon.plus/>
                            Tambah Aset Baru
                        </a>
                        <a href="{{ route('asets.create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Tambah aset baru">
                            <x-icon.plus/>
                        </a>
                        <a href="{{ route('asets.export') }}" class="btn btn-success d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                                <path d="M9 9l1 0"/>
                                <path d="M9 13l6 0"/>
                                <path d="M9 17l6 0"/>
                            </svg>
                            Export Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <!-- Stats Cards -->
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ route('asets.index') }}" class="text-decoration-none">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-package" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"/>
                                                        <path d="M12 12l8 -4.5"/>
                                                        <path d="M12 12l0 9"/>
                                                        <path d="M12 12l-8 -4.5"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    {{ number_format($totalAssets) }} Total Aset
                                                </div>
                                                <div class="text-muted">
                                                    {{ number_format($currentYearAssets) }} aset tahun ini
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ route('asets.index', ['keadaan_barang' => 'Baik']) }}" class="text-decoration-none">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-green text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                                        <path d="M9 12l2 2l4 -4"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    {{ number_format($goodConditionAssets) }} Kondisi Baik
                                                </div>
                                                <div class="text-muted">
                                                    {{ $totalAssets > 0 ? number_format(($goodConditionAssets/$totalAssets)*100, 1) : 0 }}% dari total
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ route('asets.index', ['keadaan_barang' => 'Kurang Baik']) }}" class="text-decoration-none">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-warning text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M12 9v2m0 4v.01"/>
                                                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    {{ number_format($fairConditionAssets) }} Kurang Baik
                                                </div>
                                                <div class="text-muted">
                                                    {{ $totalAssets > 0 ? number_format(($fairConditionAssets/$totalAssets)*100, 1) : 0 }}% dari total
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ route('asets.index', ['keadaan_barang' => 'Rusak Berat']) }}" class="text-decoration-none">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-danger text-white avatar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                                        <path d="M10 10l4 4m0 -4l-4 4"/>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    {{ number_format($badConditionAssets) }} Rusak Berat
                                                </div>
                                                <div class="text-muted">
                                                    {{ $totalAssets > 0 ? number_format(($badConditionAssets/$totalAssets)*100, 1) : 0 }}% dari total
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Charts and Additional Info -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Statistik Kondisi Aset</h3>
                        </div>
                        <div class="card-body">
                            <div id="chart-asset-condition" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ringkasan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <span class="text-muted">Total Nilai Aset:</span>
                                        </div>
                                        <div class="ms-auto">
                                            <strong>Rp {{ number_format($totalAssetValue, 0, ',', '.') }}</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <span class="text-muted">Aset Minggu Ini:</span>
                                        </div>
                                        <div class="ms-auto">
                                            <strong>{{ number_format($weeklyAssets) }}</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3">
                                            <span class="text-muted">Aset Hari Ini:</span>
                                        </div>
                                        <div class="ms-auto">
                                            <strong>{{ number_format($todayAssets) }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Asset Types -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top 5 Jenis Aset</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Jenis Barang</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($topAssetTypes as $type)
                                            <tr>
                                                <td>{{ $type->nama_jenis_barang }}</td>
                                                <td class="text-end">
                                                    <span class="badge bg-primary">{{ number_format($type->total) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center text-muted">
                                                    Belum ada data aset
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assets by Source -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Asal Perolehan Aset</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Asal Perolehan</th>
                                            <th class="text-end">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($assetsBySource as $source)
                                            <tr>
                                                <td>{{ $source->asal_perolehan }}</td>
                                                <td class="text-end">
                                                    <span class="badge bg-success">{{ number_format($source->total) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center text-muted">
                                                    Belum ada data aset
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('page-libraries')
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
@endpush

@pushonce('page-scripts')
    <script>
        // Chart Kondisi Aset
        document.addEventListener("DOMContentLoaded", function () {
            const conditionData = @json($conditionChartData);
            
            if (window.ApexCharts && conditionData.data.some(val => val > 0)) {
                const chart = new ApexCharts(document.getElementById('chart-asset-condition'), {
                    chart: {
                        type: "donut",
                        fontFamily: 'inherit',
                        height: 300,
                        sparkline: {
                            enabled: false
                        },
                        animations: {
                            enabled: true
                        },
                    },
                    fill: {
                        opacity: 1,
                    },
                    series: conditionData.data,
                    labels: conditionData.labels,
                    colors: conditionData.colors,
                    legend: {
                        show: true,
                        position: 'bottom',
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '75%',
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontSize: '22px',
                                        fontFamily: 'inherit',
                                        fontWeight: 600,
                                        color: undefined,
                                        offsetY: -10,
                                        formatter: function (val) {
                                            return val
                                        }
                                    },
                                    value: {
                                        show: true,
                                        fontSize: '16px',
                                        fontFamily: 'inherit',
                                        fontWeight: 400,
                                        color: undefined,
                                        offsetY: 16,
                                        formatter: function (val) {
                                            return val + ' aset'
                                        }
                                    },
                                    total: {
                                        show: true,
                                        showAlways: false,
                                        label: 'Total',
                                        fontSize: '22px',
                                        fontFamily: 'inherit',
                                        fontWeight: 600,
                                        color: '#373d3f',
                                        formatter: function (w) {
                                            return w.globals.seriesTotals.reduce((a, b) => {
                                                return a + b
                                            }, 0) + ' aset'
                                        }
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        formatter: function (val, opts) {
                            return Math.round(val) + '%'
                        },
                        style: {
                            fontSize: '14px',
                            fontFamily: 'inherit',
                            fontWeight: 'bold',
                        }
                    },
                    tooltip: {
                        theme: 'dark',
                        y: {
                            formatter: function (val) {
                                return val + ' aset'
                            }
                        }
                    }
                });
                chart.render();
            } else {
                // Show message when no data
                document.getElementById('chart-asset-condition').innerHTML = 
                    '<div class="text-center text-muted py-5">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">' +
                    '<path stroke="none" d="M0 0h24v24H0z" fill="none"/>' +
                    '<path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>' +
                    '<path d="M9 10l.01 0"/>' +
                    '<path d="M15 10l.01 0"/>' +
                    '<path d="M9.5 15a3.5 3.5 0 0 0 5 0"/>' +
                    '</svg>' +
                    '<p>Belum ada data aset untuk ditampilkan</p>' +
                    '</div>';
            }
        });
    </script>
@endpushonce