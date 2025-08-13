@extends('layouts.tabler')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="text-muted">
            <i class="fas fa-calendar-alt"></i> {{ now()->format('d F Y') }}
        </div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Row 1 - Statistik Aset Utama -->
    <div class="row">
        <!-- Total Aset Tetap -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Aset Tetap
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($totalAsetTetap ?? 0) }} Item
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-plus text-success"></i> {{ $asetTetapBaru ?? 0 }} baru (30 hari)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai Aset Tetap -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nilai Aset Tetap
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($nilaiTotalAsetTetap ?? 0, 0, ',', '.') }}
                            </div>
                            <div class="text-muted small">
                                Total nilai aset tetap
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Tetap Kondisi Baik -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Aset Tetap Kondisi Baik
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($asetBaik ?? 0) }}
                            </div>
                            <div class="text-muted small">
                                Kondisi baik dan berfungsi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Tetap Bermasalah -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Aset Tetap Bermasalah
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format(($asetKurangBaik ?? 0) + ($asetRusakBerat ?? 0)) }} Item
                            </div>
                            <div class="text-muted small">
                                KB: {{ $asetKurangBaik ?? 0 }} | RB: {{ $asetRusakBerat ?? 0 }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2 - Aset Lainnya -->
    <div class="row">
        <!-- Total Aset Lainnya -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Aset Lainnya
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($totalAsetLainnya ?? 0) }} Item
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-plus text-success"></i> {{ $asetLainnyaBaru ?? 0 }} baru (30 hari)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai Aset Lainnya -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Nilai Aset Lainnya
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($nilaiTotalAsetLainnya ?? 0, 0, ',', '.') }}
                            </div>
                            <div class="text-muted small">
                                Total nilai aset lainnya
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Lainnya Kondisi Baik -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Aset Lainnya Kondisi Baik
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format(App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->where('keadaan_barang', 'B')->count()) }}
                            </div>
                            <div class="text-muted small">
                                Kondisi baik dan berfungsi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Lainnya Bermasalah -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Aset Lainnya Bermasalah
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format(App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->whereIn('keadaan_barang', ['KB', 'RB'])->count()) }} Item
                            </div>
                            <div class="text-muted small">
                                KB: {{ App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->where('keadaan_barang', 'KB')->count() }} | 
                                RB: {{ App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->where('keadaan_barang', 'RB')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3 - Aset Lancar & Pengguna -->
    <div class="row">
        <!-- Total Aset Lancar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Aset Lancar
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($totalAsetLancar ?? 0) }} Item
                            </div>
                            <div class="text-muted small">
                                Total item aset lancar
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Saldo Akhir Total -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo Akhir Total
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                Rp {{ number_format($nilaiSaldoAkhirTotal ?? 0, 0, ',', '.') }}
                            </div>
                            <div class="text-muted small">
                                Total nilai saldo akhir
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Pengguna -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Pengguna
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ number_format($totalPengguna ?? 0) }} User
                            </div>
                            <div class="text-muted small">
                                <i class="fas fa-plus text-success"></i> {{ $penggunaBaru ?? 0 }} baru (30 hari)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aktivitas Bulan Ini -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Aktivitas Bulan Ini
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                {{ ($asetTetapBulanIni ?? 0) + ($asetLainnyaBulanIni ?? 0) + ($asetLancarBulanIni ?? 0) }}
                            </div>
                            <div class="text-muted small">
                                Tetap: {{ $asetTetapBulanIni ?? 0 }} | 
                                Lainnya: {{ $asetLainnyaBulanIni ?? 0 }} | 
                                Lancar: {{ $asetLancarBulanIni ?? 0 }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 4 - Chart Section -->
    <div class="row">
        <!-- Kondisi Aset Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kondisi Aset Tetap</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px">
                        <canvas id="kondisiAsetChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aset Per Tahun Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aset Per Tahun Perolehan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height:300px">
                        <canvas id="asetPerTahunChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 5 - Summary Cards -->
    <div class="row">
        <!-- Quick Stats -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ringkasan Statistik</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <h5 class="text-primary font-weight-bold">
                                    {{ number_format(($totalAsetTetap ?? 0) + ($totalAsetLainnya ?? 0) + ($totalAsetLancar ?? 0)) }}
                                </h5>
                                <small class="text-muted">Total Semua Aset</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h5 class="text-success font-weight-bold">
                                    Rp {{ number_format(($nilaiTotalAsetTetap ?? 0) + ($nilaiTotalAsetLainnya ?? 0) + ($nilaiSaldoAkhirTotal ?? 0), 0, ',', '.') }}
                                </h5>
                                <small class="text-muted">Total Nilai Aset</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h5 class="text-info font-weight-bold">
                                    {{ number_format(($asetBaik ?? 0) + App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->where('keadaan_barang', 'B')->count()) }}
                                </h5>
                                <small class="text-muted">Aset Kondisi Baik</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h5 class="text-warning font-weight-bold">
                                    {{ number_format(($asetKurangBaik ?? 0) + ($asetRusakBerat ?? 0) + App\Models\Aset::whereHas('subSubRincianObjek.subRincianObjek.rincianObjek.objek.jenis.kelompok', function ($q) { $q->where('kode', '1.5'); })->whereIn('keadaan_barang', ['KB', 'RB'])->count()) }}
                                </h5>
                                <small class="text-muted">Aset Bermasalah</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Kondisi Aset Pie Chart
const kondisiCtx = document.getElementById('kondisiAsetChart').getContext('2d');
new Chart(kondisiCtx, {
    type: 'doughnut',
    data: {
        labels: ['Baik', 'Kurang Baik', 'Rusak Berat'],
        datasets: [{
            data: [{{ $asetBaik ?? 0 }}, {{ $asetKurangBaik ?? 0 }}, {{ $asetRusakBerat ?? 0 }}],
            backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = ((context.parsed * 100) / total).toFixed(1);
                        return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                    }
                }
            }
        }
    }
});

// Aset Per Tahun Bar Chart
const tahunCtx = document.getElementById('asetPerTahunChart').getContext('2d');
new Chart(tahunCtx, {
    type: 'bar',
    data: {
        labels: [
            @foreach($asetPerTahun ?? [] as $data)
                '{{ $data->tahun_perolehan }}',
            @endforeach
        ],
        datasets: [{
            label: 'Jumlah Aset',
            data: [
                @foreach($asetPerTahun ?? [] as $data)
                    {{ $data->jumlah }},
                @endforeach
            ],
            backgroundColor: '#4e73df',
            borderColor: '#4e73df',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            },
            x: {
                ticks: {
                    maxRotation: 45
                }
            }
        }
    }
});
</script>
<style>

/* Card Enhancements */
.card {
    transition: all 0.3s ease;
    border-radius: 0.75rem;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;
}

/* Border Left Colors */
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.border-left-secondary {
    border-left: 0.25rem solid #858796 !important;
}

.border-left-dark {
    border-left: 0.25rem solid #5a5c69 !important;
}

.border-left-danger {
    border-left: 0.25rem solid #e74a3b !important;
}

/* Card Body Padding */
.card-body {
    padding: 1.5rem;
}

/* Text Colors */
.text-primary {
    color: #4e73df !important;
}

.text-success {
    color: #1cc88a !important;
}

.text-info {
    color: #36b9cc !important;
}

.text-warning {
    color: #f6c23e !important;
}

.text-secondary {
    color: #858796 !important;
}

.text-dark {
    color: #5a5c69 !important;
}

.text-danger {
    color: #e74a3b !important;
}

/* Gradient Backgrounds for Cards */
.card.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
    color: white;
}

.card.bg-gradient-success {
    background: linear-gradient(45deg, #1cc88a, #13855c);
    color: white;
}

.card.bg-gradient-info {
    background: linear-gradient(45deg, #36b9cc, #258391);
    color: white;
}

.card.bg-gradient-warning {
    background: linear-gradient(45deg, #f6c23e, #d4a90a);
    color: white;
}

/* Icon Styling */
.fa-2x {
    font-size: 2em;
    opacity: 0.1;
}

/* Number Formatting */
.h4, .h5, .h6 {
    font-weight: 700;
}

/* Small Text */
.small {
    font-size: 0.875rem;
    font-weight: 500;
}

/* Chart Container */
.chart-container {
    position: relative;
    margin: auto;
    height: 300px;
    width: 100%;
}

/* Card Header */
.card-header {
    background-color: #f8f9fc;
    border-bottom: 1px solid #e3e6f0;
}

.card-header h6 {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.025rem;
}

/* Summary Stats */
.text-center h5 {
    margin-bottom: 0.25rem;
    font-size: 1.75rem;
}

.text-center small {
    font-size: 0.75rem;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 0.025rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .col-xl-3 {
        margin-bottom: 1rem;
    }
    
    .card-body {
        padding: 1rem;
    }
    
    .h4 {
        font-size: 1.25rem;
    }
    
    .fa-2x {
        font-size: 1.5em;
    }
}

/* Animation for Numbers */
.counter {
    font-weight: 700;
    font-size: 1.75rem;
}

/* Loading State */
.card.loading {
    opacity: 0.7;
    pointer-events: none;
}

.card.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #f3f3f3;
    border-top: 2px solid #4e73df;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Status Indicators */
.status-indicator {
    display: inline-block;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin-right: 0.5rem;
}

.status-indicator.good {
    background-color: #1cc88a;
}

.status-indicator.warning {
    background-color: #f6c23e;
}

.status-indicator.danger {
    background-color: #e74a3b;
}

/* Card Icons Enhancement */
.card-icon {
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    opacity: 0.1;
    font-size: 3rem;
    color: inherit;
}

/* Hover Effects for Interactive Elements */
.card-clickable {
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.card-clickable:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.75rem 2rem rgba(0, 0, 0, 0.15) !important;
}

/* Progress Bars in Cards */
.progress-sm {
    height: 0.375rem;
}

.progress {
    border-radius: 0.25rem;
    overflow: hidden;
}

/* Badge Styling */
.badge-counter {
    position: absolute;
    top: -0.5rem;
    right: -0.5rem;
    background-color: #e74a3b;
    color: white;
    border-radius: 50%;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.25rem 0.5rem;
    min-width: 1.5rem;
    text-align: center;
}
</style>
@endpush
@endsection