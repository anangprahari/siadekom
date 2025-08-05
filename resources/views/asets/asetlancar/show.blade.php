@extends('layouts.tabler')

@section('content')
<div class="container-fluid p-1">
    <!-- Page Header -->
    <div class="page-header d-print-none mb-4">
        <div class="row align-items-center">
            <div class="col">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar avatar-lg bg-blue-lt">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="page-title mb-0">Detail Aset Lancar</h2>
                        <div class="text-muted mt-1">Informasi lengkap aset lancar {{ $asetLancar->nama_kegiatan }}</div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <a href="{{ route('aset-lancars.index') }}" class="btn btn-outline-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12,19 5,12 12,5"></polyline>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <a href="{{ route('aset-lancars.edit', $asetLancar) }}" class="btn btn-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                            <path d="M16 5l3 3"></path>
                        </svg>
                        Edit Aset
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Asset Overview Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Informasi Utama Aset</h3>
                            <div class="text-white-opacity-75 small">Detail identitas dan spesifikasi aset lancar</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Kode Rekening</label>
                                <div class="detail-value font-mono">{{ $asetLancar->rekeningUraian->kode_rekening }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Tanggal Dibuat</label>
                                <div class="detail-value font-mono">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                        <line x1="16" y1="3" x2="16" y2="7"></line>
                                        <line x1="8" y1="3" x2="8" y2="7"></line>
                                        <line x1="4" y1="11" x2="20" y2="11"></line>
                                    </svg>
                                    {{ $asetLancar->created_at->format('d F Y, H:i') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="detail-label">Uraian Rekening</label>
                                <div class="detail-value font-mono">{{ $asetLancar->rekeningUraian->uraian }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="detail-label">Nama Kegiatan</label>
                                <div class="detail-value font-mono">{{ $asetLancar->nama_kegiatan }}</div>
                            </div>
                        </div>
                        @if($asetLancar->uraian_kegiatan)
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="detail-label">Uraian Kegiatan</label>
                                <div class="detail-value">{{ $asetLancar->uraian_kegiatan }}</div>
                            </div>
                        </div>
                        @endif
                        @if($asetLancar->uraian_jenis_barang)
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Jenis Barang</label>
                                <div class="detail-value font-mono">{{ $asetLancar->uraian_jenis_barang }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Terakhir Diperbarui</label>
                                <div class="detail-value font-mono">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <polyline points="12,7 12,12 15,15"></polyline>
                                    </svg>
                                    {{ $asetLancar->updated_at->format('d F Y, H:i') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">ID Record</label>
                                <div class="detail-value font-mono">#{{ $asetLancar->id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Breakdown Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 3h18v18h-18z"></path>
                                <path d="M3 9h18"></path>
                                <path d="M9 3v18"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Rincian Perhitungan Aset</h3>
                            <div class="text-white-opacity-75 small">Detail perhitungan saldo dan mutasi</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th rowspan="2" class="text-center align-middle">Komponen</th>
                                    <th colspan="2" class="text-center">Saldo Awal</th>
                                    <th colspan="4" class="text-center">Mutasi</th>
                                    <th colspan="2" class="text-center">Saldo Akhir</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Tambah Unit</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Kurang Unit</th>
                                    <th class="text-center">Nilai Total</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Nilai Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">{{ $asetLancar->nama_kegiatan }}</td>
                                    <td class="text-center" style="background-color: #f0f9ff;">
                                        <span class="badge bg-cyan text-white">{{ number_format($asetLancar->saldo_awal_unit) }}</span>
                                    </td>
                                    <td class="text-end" style="background-color: #f0f9ff;">
                                        Rp {{ number_format($asetLancar->saldo_awal_harga_satuan, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center" style="background-color: #f0fdf4;">
                                        @if($asetLancar->mutasi_tambah_unit > 0)
                                            <span class="badge bg-success">+{{ number_format($asetLancar->mutasi_tambah_unit) }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-end" style="background-color: #f0fdf4;">
                                        @if($asetLancar->mutasi_tambah_harga_satuan > 0)
                                            Rp {{ number_format($asetLancar->mutasi_tambah_harga_satuan, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="background-color: #fef2f2;">
                                        @if($asetLancar->mutasi_kurang_unit > 0)
                                            <span class="badge bg-danger">-{{ number_format($asetLancar->mutasi_kurang_unit) }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-end" style="background-color: #fef2f2;">
                                        @if($asetLancar->mutasi_kurang_nilai_total > 0)
                                            <span class="text-danger fw-bold">Rp {{ number_format($asetLancar->mutasi_kurang_nilai_total, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center" style="background-color: #fffbeb;">
                                        <span class="badge bg-warning text-dark">{{ number_format($asetLancar->saldo_akhir_unit) }}</span>
                                    </td>
                                    <td class="text-end" style="background-color: #fffbeb;">
                                        <span class="fw-bold text-primary fs-5">Rp {{ number_format($asetLancar->saldo_akhir_total, 0, ',', '.') }}</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td class="fw-bold">Total Nilai</td>
                                    <td colspan="2" class="text-end fw-bold text-info">
                                        Rp {{ number_format($asetLancar->saldo_awal_total, 0, ',', '.') }}
                                    </td>
                                    <td colspan="2" class="text-end fw-bold text-success">
                                        Rp {{ number_format($asetLancar->mutasi_tambah_nilai_total, 0, ',', '.') }}
                                    </td>
                                    <td class="text-end fw-bold text-danger">
                                        Rp {{ number_format($asetLancar->mutasi_kurang_nilai_total, 0, ',', '.') }}
                                    </td>
                                    <td colspan="2" class="text-end fw-bold text-primary fs-5">
                                        Rp {{ number_format($asetLancar->saldo_akhir_total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Calculation Formula Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="2" width="16" height="20" rx="2"></rect>
                                <path d="M8 6h8"></path>
                                <path d="M8 10h8"></path>
                                <path d="M8 14h4"></path>
                                <path d="M8 18h6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Formula Perhitungan</h3>
                            <div class="text-white-opacity-75 small">Rumus dan logika perhitungan</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="calculation-box">
                                <h6 class="calculation-title">Perhitungan Nilai Total</h6>
                                <div class="calculation-item mb-3">
                                    <label class="calculation-label">Saldo Awal Total</label>
                                    <div class="calculation-formula">
                                        <code>{{ number_format($asetLancar->saldo_awal_unit) }} unit × Rp {{ number_format($asetLancar->saldo_awal_harga_satuan, 0, ',', '.') }} = Rp {{ number_format($asetLancar->saldo_awal_total, 0, ',', '.') }}</code>
                                    </div>
                                </div>
                                <div class="calculation-item">
                                    <label class="calculation-label">Mutasi Tambah Total</label>
                                    <div class="calculation-formula">
                                        <code>{{ number_format($asetLancar->mutasi_tambah_unit) }} unit × Rp {{ number_format($asetLancar->mutasi_tambah_harga_satuan, 0, ',', '.') }} = Rp {{ number_format($asetLancar->mutasi_tambah_nilai_total, 0, ',', '.') }}</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="calculation-box">
                                <h6 class="calculation-title text-success">Perhitungan Unit</h6>
                                <div class="calculation-item mb-3">
                                    <label class="calculation-label">Saldo Akhir Unit</label>
                                    <div class="calculation-formula">
                                        <code>{{ number_format($asetLancar->saldo_awal_unit) }} + {{ number_format($asetLancar->mutasi_tambah_unit) }} - {{ number_format($asetLancar->mutasi_kurang_unit) }} = {{ number_format($asetLancar->saldo_akhir_unit) }} unit</code>
                                    </div>
                                </div>
                                <div class="calculation-item">
                                    <label class="calculation-label">Saldo Akhir Total</label>
                                    <div class="calculation-formula">
                                        @php
                                            $harga_satuan_akhir = $asetLancar->saldo_awal_harga_satuan > 0 ? $asetLancar->saldo_awal_harga_satuan : $asetLancar->mutasi_tambah_harga_satuan;
                                        @endphp
                                        <code>{{ number_format($asetLancar->saldo_akhir_unit) }} unit × Rp {{ number_format($harga_satuan_akhir, 0, ',', '.') }} = Rp {{ number_format($asetLancar->saldo_akhir_total, 0, ',', '.') }}</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Summary Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                <path d="M9 12l2 2l4 -4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Ringkasan Nilai</h3>
                            <div class="text-white-opacity-75 small">Rekapitulasi finansial aset</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="summary-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="summary-label">Saldo Awal Total</span>
                            <span class="summary-value text-info fw-bold">Rp {{ number_format($asetLancar->saldo_awal_total, 0, ',', '.') }}</span>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="summary-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="summary-label">Mutasi Tambah</span>
                            <span class="summary-value text-success fw-bold">Rp {{ number_format($asetLancar->mutasi_tambah_nilai_total, 0, ',', '.') }}</span>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: {{ $asetLancar->mutasi_tambah_nilai_total > 0 ? '100' : '0' }}%"></div>
                        </div>
                    </div>
                    <div class="summary-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="summary-label">Mutasi Kurang</span>
                            <span class="summary-value text-danger fw-bold">Rp {{ number_format($asetLancar->mutasi_kurang_nilai_total, 0, ',', '.') }}</span>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: {{ $asetLancar->mutasi_kurang_nilai_total > 0 ? '100' : '0' }}%"></div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="summary-item mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="summary-label fw-bold">Saldo Akhir Total</span>
                            <span class="summary-value text-primary fw-bold fs-4">Rp {{ number_format($asetLancar->saldo_akhir_total, 0, ',', '.') }}</span>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                    </div>
                    @php
                        $persentasePerubahan = 0;
                        if ($asetLancar->saldo_awal_total > 0) {
                            $persentasePerubahan = (($asetLancar->saldo_akhir_total - $asetLancar->saldo_awal_total) / $asetLancar->saldo_awal_total) * 100;
                        }
                    @endphp
                    @if($persentasePerubahan != 0)
                        <div class="mt-3 text-center">
                            <small class="text-muted">Perubahan dari Saldo Awal</small>
                            <div class="mt-1">
                                @if($persentasePerubahan > 0)
                                    <span class="badge bg-success fs-6 px-3 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="7,17 12,12 17,17"></polyline>
                                            <polyline points="12,12 12,21"></polyline>
                                        </svg>
                                        +{{ number_format($persentasePerubahan, 1) }}%
                                    </span>
                                @else
                                    <span class="badge bg-danger fs-6 px-3 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="17,7 12,12 7,7"></polyline>
                                            <polyline points="12,12 12,3"></polyline>
                                        </svg>
                                        {{ number_format($persentasePerubahan, 1) }}%
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Timeline Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <polyline points="12,7 12,12 15,15"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Timeline Data</h3>
                            <div class="text-white-opacity-75 small">Riwayat perubahan data</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Data Dibuat</h6>
                                <p class="timeline-description mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-2 text-primary" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <polyline points="12,7 12,12 15,15"></polyline>
                                    </svg>
                                    {{ $asetLancar->created_at->format('d F Y, H:i:s') }}
                                </p>
                                <small class="text-muted">{{ $asetLancar->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @if($asetLancar->created_at != $asetLancar->updated_at)
                            <div class="timeline-item">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <h6 class="timeline-title">Terakhir Diperbarui</h6>
                                    <p class="timeline-description mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-2 text-warning" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                            <path d="M16 5l3 3"></path>
                                        </svg>
                                        {{ $asetLancar->updated_at->format('d F Y, H:i:s') }}
                                    </p>
                                    <small class="text-muted">{{ $asetLancar->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path>
                                <path d="M8 11l2 2l6 -5"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Tindakan Cepat</h3>
                            <div class="text-white-opacity-75 small">Aksi yang tersedia</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('aset-lancars.edit', $asetLancar) }}" class="btn btn-outline-yellow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                <path d="M16 5l3 3"></path>
                            </svg>
                            Edit Data Aset
                        </a>
                        <button class="btn btn-outline-danger" onclick="confirmDelete({{ $asetLancar->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                            Hapus Aset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.32/sweetalert2.all.min.js"></script>
<script>
// Delete Confirmation with SweetAlert2
function confirmDelete(id) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        html: `Apakah Anda yakin ingin menghapus data aset lancar <strong>"{{ $asetLancar->nama_kegiatan }}"</strong>?<br><br><span class="text-danger">Data yang sudah dihapus tidak dapat dikembalikan.</span>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#64748b',
        confirmButtonText: '<i class="fas fa-trash me-2"></i>Ya, Hapus Data',
        cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('delete-form');
            if (form) {
                form.action = `{{ route('aset-lancars.index') }}/${id}`;
                
                Swal.fire({
                    title: 'Menghapus...',
                    text: 'Sedang memproses penghapusan data',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                form.submit();
            }
        }
    });
}

// Enhanced interactions
$(document).ready(function() {
    // Show success/error messages
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    @endif

    // Add smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Add loading state to buttons
    $('.btn').on('click', function() {
        const $btn = $(this);
        if (!$btn.hasClass('btn-close') && !$btn.attr('data-bs-dismiss') && !$btn.attr('onclick')) {
            const originalText = $btn.html();
            $btn.prop('disabled', true);
            
            // Add loading spinner for Edit button
            if ($btn.text().includes('Edit')) {
                $btn.html('<div class="spinner-border spinner-border-sm me-2" role="status"></div>' + $btn.text());
                
                // Reset after 3 seconds as fallback
                setTimeout(() => {
                    $btn.prop('disabled', false);
                    $btn.html(originalText);
                }, 3000);
            }
        }
    });

    // Animate cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);

    // Observe all cards
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });

    // Add hover effects for timeline items
    $('.timeline-item').hover(
        function() {
            $(this).addClass('timeline-hover');
        },
        function() {
            $(this).removeClass('timeline-hover');
        }
    );
});

// Toast notification function
function showToast(type, message) {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    toast.innerHTML = `
        <div class="d-flex">
            <div class="me-3">
                <svg class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                    ${type === 'success' ? '<path d="M5 12l5 5l10 -10"></path>' : '<circle cx="12" cy="12" r="9"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line>'}
                </svg>
            </div>
            <div>${message}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(toast);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        toast.remove();
    }, 3000);
}
</script>
@endpush

@push('page-styles')
<style>
/* Enhanced Detail Page Styling */
:root {
    --blue-primary: #2563eb;
    --blue-secondary: #3b82f6;
    --blue-light: #dbeafe;
    --blue-extra-light: #eff6ff;
    --blue-dark: #1e40af;
    --cyan-primary: #0891b2;
    --cyan-light: #e0f7fa;
    --success-primary: #059669;
    --success-light: #f0fdf4;
    --danger-primary: #dc2626;
    --danger-light: #fef2f2;
    --warning-primary: #d97706;
    --warning-light: #fffbeb;
    --shadow-light: 0 1px 3px 0 rgba(59, 130, 246, 0.1), 0 1px 2px 0 rgba(59, 130, 246, 0.06);
    --shadow-medium: 0 4px 6px -1px rgba(59, 130, 246, 0.1), 0 2px 4px -1px rgba(59, 130, 246, 0.06);
    --shadow-large: 0 10px 15px -3px rgba(59, 130, 246, 0.1), 0 4px 6px -2px rgba(59, 130, 246, 0.05);
    --border-radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Card Enhancements */
.card {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-large);
    background: white;
    overflow: hidden;
    transition: var(--transition);
    opacity: 0;
    transform: translateY(20px);
}

.card:hover {
    box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.1), 0 10px 10px -5px rgba(59, 130, 246, 0.04);
    transform: translateY(-4px);
}

/* Gradient Headers */
.bg-gradient-blue {
    background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
}

/* Text opacity fix */
.text-white-opacity-75 {
    color: rgba(255, 255, 255, 0.75) !important;
}

/* Detail Items */
.detail-item {
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
    border-left: 4px solid var(--blue-primary);
    transition: var(--transition);
    height: 100%;
}

.detail-item:hover {
    background: var(--blue-extra-light);
    transform: translateX(4px);
    box-shadow: var(--shadow-light);
}

.detail-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.25rem;
    display: block;
}

.detail-value {
    font-size: 1rem;
    font-weight: 500;
    color: #1e293b;
    line-height: 1.4;
}

/* Summary Items */
.summary-item {
    padding: 0.75rem;
    background: #f8fafc;
    border-radius: 8px;
    border-left: 3px solid var(--blue-primary);
    transition: var(--transition);
}

.summary-item:hover {
    background: var(--blue-extra-light);
    transform: translateX(3px);
}

.summary-label {
    font-size: 0.875rem;
    color: #64748b;
    font-weight: 500;
}

.summary-value {
    font-size: 1rem;
    font-weight: 600;
}

/* Calculation Box */
.calculation-box {
    background: #f8fafc;
    border-radius: 8px;
    padding: 1rem;
    border-left: 4px solid var(--success-primary);
    height: 100%;
}

.calculation-title {
    color: var(--blue-primary);
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--blue-primary);
}

.calculation-item {
    margin-bottom: 1rem;
}

.calculation-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
    display: block;
}

.calculation-formula {
    background: white;
    padding: 0.75rem;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    box-shadow: var(--shadow-light);
}

.calculation-formula code {
    color: #1e293b;
    font-weight: 500;
    font-size: 0.875rem;
    background: transparent;
    padding: 0;
    border: none;
}

/* Timeline Styling */
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(180deg, transparent 0%, #e2e8f0 20%, #e2e8f0 80%, transparent 100%);
}

.timeline-item {
    position: relative;
    margin-bottom: 1.5rem;
    transition: var(--transition);
}

.timeline-item.timeline-hover {
    transform: translateX(5px);
}

.timeline-marker {
    position: absolute;
    left: -23px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 2px var(--blue-primary);
    z-index: 1;
}

.timeline-marker.bg-primary {
    background: linear-gradient(135deg, var(--blue-primary), var(--blue-secondary));
}

.timeline-marker.bg-warning {
    background: linear-gradient(135deg, var(--warning-primary), #fbbf24);
}

.timeline-content {
    background: white;
    border-radius: 8px;
    padding: 1rem;
    margin-left: 20px;
    box-shadow: var(--shadow-light);
    border-left: 3px solid var(--blue-primary);
    transition: var(--transition);
}

.timeline-content:hover {
    box-shadow: var(--shadow-medium);
    background: var(--blue-extra-light);
}

.timeline-title {
    color: var(--blue-primary);
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.timeline-description {
    color: #1e293b;
    font-size: 0.875rem;
    margin: 0;
}

/* Table Enhancements */
.table {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: var(--shadow-light);
}

.table th, .table td {
    vertical-align: middle;
    font-size: 0.875rem;
    padding: 0.75rem;
    border-color: #e2e8f0;
}

.table thead th {
    background: #1e293b;
    color: white;
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.table tbody tr:hover {
    background-color: var(--blue-extra-light);
    transform: scale(1.01);
    transition: var(--transition);
}

.table-dark th {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
}

/* Enhanced table cell backgrounds */
.table td[style*="background-color"] {
    border-left: 3px solid transparent;
    transition: var(--transition);
}

.table td[style*="background-color: #f0f9ff"] {
    border-left-color: var(--cyan-primary);
}

.table td[style*="background-color: #f0fdf4"] {
    border-left-color: var(--success-primary);
}

.table td[style*="background-color: #fef2f2"] {
    border-left-color: var(--danger-primary);
}

.table td[style*="background-color: #fffbeb"] {
    border-left-color: var(--warning-primary);
}

/* Progress Bar Enhancements */
.progress {
    height: 6px;
    border-radius: 3px;
    background-color: #e2e8f0;
    overflow: hidden;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.progress-sm {
    height: 4px;
}

.progress-bar {
    border-radius: 3px;
    transition: width 0.6s ease;
    background: linear-gradient(90deg, var(--blue-primary), var(--blue-secondary));
}

.progress-bar.bg-info {
    background: linear-gradient(90deg, var(--cyan-primary), #06b6d4) !important;
}

.progress-bar.bg-success {
    background: linear-gradient(90deg, var(--success-primary), #10b981) !important;
}

.progress-bar.bg-danger {
    background: linear-gradient(90deg, var(--danger-primary), #ef4444) !important;
}

.progress-bar.bg-primary {
    background: linear-gradient(90deg, var(--blue-primary), var(--blue-secondary)) !important;
}

/* Badge Enhancements */
.badge {
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.75rem;
    letter-spacing: 0.025em;
    box-shadow: var(--shadow-light);
    transition: var(--transition);
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-medium);
}

.bg-cyan { 
    background: linear-gradient(135deg, var(--cyan-primary), #06b6d4) !important; 
    color: white !important; 
}

.bg-success {
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%) !important;
    color: white !important;
}

.bg-warning {
    background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%) !important;
    color: white !important;
}

.bg-danger {
    background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%) !important;
    color: white !important;
}

.badge.fs-6 {
    font-size: 0.875rem !important;
    padding: 0.375rem 0.75rem;
}

/* Button Styling */
.btn {
    border-radius: 8px;
    font-weight: 500;
    letter-spacing: 0.025em;
    transition: var(--transition);
    border: none;
    box-shadow: var(--shadow-light);
    position: relative;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: var(--transition);
}

.btn:hover::before {
    left: 100%;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-medium);
}

.btn:focus,
.btn:focus-visible {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    border-color: var(--blue-primary) !important;
    outline: 2px solid var(--blue-primary);
    outline-offset: 2px;
}

.btn-yellow {
    background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
    color: white;
}

.btn .icon {
    transition: var(--transition);
    vertical-align: middle;
}

.btn:hover .icon {
    transform: scale(1.1);
}

/* Page Header Enhancement */
.page-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: var(--border-radius);
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
}

.page-title {
    font-weight: 700;
    color: #1e293b;
    text-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Color variants */
.bg-blue-lt { 
    background-color: var(--blue-light) !important; 
    color: var(--blue-dark) !important; 
}

.text-muted {
    color: #64748b !important;
}

/* Enhanced visual hierarchy */
h1, h2, h3, h4, h5, h6 {
    color: #1e293b;
    font-weight: 600;
}

.card-header .card-title {
    margin-bottom: 0;
    font-size: 1.1rem;
}

/* Better avatar styling */
.avatar {
    box-shadow: var(--shadow-light);
    transition: var(--transition);
}

.avatar:hover {
    transform: scale(1.05);
    box-shadow: var(--shadow-medium);
}

/* Loading States */
.btn.loading {
    pointer-events: none;
    opacity: 0.7;
}

.spinner-border-sm {
    width: 1rem;
    height: 1rem;
}

/* Alert positioning */
.alert.position-fixed {
    animation: slideInRight 0.3s ease-out;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--blue-light), var(--blue-primary));
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
}

/* Enhanced card spacing */
.card-body.p-4 {
    padding: 2rem !important;
}

/* Better text contrast */
.text-primary {
    color: var(--blue-primary) !important;
}

/* Improved spacing */
.row.g-4 > * {
    margin-bottom: 1.5rem;
}

/* Better spacing for button groups */
.d-grid .btn + .btn {
    margin-top: 0.5rem;
}

/* Better visual separation */
hr {
    border-color: #e2e8f0;
    opacity: 0.5;
}

/* Accessibility improvements */
.timeline-item:focus-within,
.detail-item:focus-within,
.summary-item:focus-within {
    background: var(--blue-extra-light);
    outline: 2px solid var(--blue-primary);
    outline-offset: -2px;
}

.card:focus-within {
    outline: 2px solid var(--blue-primary);
    outline-offset: 2px;
}

/* Performance optimizations */
.card,
.btn,
.badge,
.timeline-item,
.detail-item,
.summary-item {
    will-change: transform;
}

/* Better text selection */
::selection {
    background: var(--blue-light);
    color: var(--blue-dark);
}

/* Responsive Design */
@media (max-width: 768px) {
    .detail-item, .summary-item, .calculation-box {
        margin-bottom: 1rem;
    }
    
    .timeline {
        padding-left: 20px;
    }
    
    .timeline-marker {
        left: -13px;
        width: 12px;
        height: 12px;
    }
    
    .timeline-content {
        margin-left: 15px;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
    
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .calculation-formula {
        padding: 0.5rem;
    }
    
    .calculation-formula code {
        font-size: 0.75rem;
    }
}

@media (max-width: 576px) {
    .page-header {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .detail-item, .summary-item, .calculation-box {
        padding: 0.75rem;
    }
    
    .timeline {
        padding-left: 15px;
    }
    
    .timeline-marker {
        left: -10px;
        width: 10px;
        height: 10px;
    }
    
    .timeline-content {
        margin-left: 10px;
        padding: 0.75rem;
    }
    
    .btn-list .btn {
        margin-bottom: 0.5rem;
    }
    
    .table th, .table td {
        font-size: 0.75rem;
        padding: 0.5rem;
    }
}

@media (max-width: 992px) {
    .col-lg-8, .col-lg-4 {
        margin-bottom: 1rem;
    }
}

/* Final enhancements */
.calculation-item:last-child {
    margin-bottom: 0;
}

.summary-item:last-child {
    margin-bottom: 0;
}

/* Ensure smooth transitions for all interactive elements */
* {
    -webkit-tap-highlight-color: transparent;
}

/* Better focus indicators */
.timeline-content,
.detail-item,
.summary-item,
.calculation-box {
    cursor: default;
}

/* Financial highlight */
.detail-value .fs-2,
.detail-value .fs-3,
.detail-value .fs-4,
.summary-value.fs-4 {
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>
@endpush