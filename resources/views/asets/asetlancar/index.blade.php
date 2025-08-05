@extends('layouts.tabler')

@section('content')
<div class="container-fluid p-1">
    <div class="page-header d-print-none mb-4">
        <div class="row align-items-center">
            <div class="col">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div class="avatar avatar-lg bg-blue-lt">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                <line x1="12" y1="12" x2="12" y2="21"></line>
                                <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="page-title mb-0">Manajemen Aset Lancar</h2>
                        <div class="text-muted mt-1">Kelola dan pantau seluruh aset lancar yang tercatat dalam sistem</div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <form action="{{ route('aset-lancars.export') }}" method="GET" style="display: inline-block;">
                        <input type="hidden" name="search" id="export_search" value="{{ request('search') }}">
                        <input type="hidden" name="rekening_uraian_id" id="export_rekening_uraian_id" value="{{ request('rekening_uraian_id') }}">
                        <input type="hidden" name="nama_kegiatan" id="export_nama_kegiatan" value="{{ request('nama_kegiatan') }}">
                        <input type="hidden" name="uraian_jenis_barang" id="export_uraian_jenis_barang" value="{{ request('uraian_jenis_barang') }}">
                        <input type="hidden" name="date_from" id="export_date_from" value="{{ request('date_from') }}">
                        <input type="hidden" name="date_to" id="export_date_to" value="{{ request('date_to') }}">
                        <input type="hidden" name="saldo_awal_min" id="export_saldo_awal_min" value="{{ request('saldo_awal_min') }}">
                        <input type="hidden" name="saldo_awal_max" id="export_saldo_awal_max" value="{{ request('saldo_awal_max') }}">
                        <button type="submit" class="btn btn-outline-blue d-none d-md-inline-block" id="exportFormBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <line x1="9" y1="9" x2="10" y2="9"></line>
                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                <line x1="9" y1="17" x2="15" y2="17"></line>
                            </svg>
                            Export Excel
                        </button>
                    </form>

                    <a href="{{ route('aset-lancars.create') }}" class="btn btn-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Aset Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <div class="d-flex">
                <div class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="alert-title">Berhasil!</h4>
                    <div class="text-muted">{{ session('success') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible mb-4" role="alert">
            <div class="d-flex">
                <div class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <div>
                    <h4 class="alert-title">Error!</h4>
                    <div class="text-muted">{{ session('error') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('aset-lancars.index') }}">
                <div class="row g-2 align-items-end">
                    <div class="col-md-12 mb-3">
                        <label for="search" class="form-label fw-bold text-blue mb-1">Pencarian Cepat</label>
                        <div class="input-group">
                            <span class="input-group-text bg-blue-lt text-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input type="text" name="search" id="search" class="form-control" placeholder="Cari berdasarkan nama kegiatan, uraian, jenis barang, kode rekening..." value="{{ request('search') }}">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="rekening_uraian_id" class="form-label fw-bold text-blue mb-1">Rekening Uraian</label>
                        <select name="rekening_uraian_id" id="rekening_uraian_id" class="form-select">
                            <option value="">Semua Rekening</option>
                            @foreach($rekeningUraians as $rekening)
                                <option value="{{ $rekening->id }}" {{ request('rekening_uraian_id') == $rekening->id ? 'selected' : '' }}>
                                    {{ $rekening->kode_rekening }} - {{ $rekening->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="nama_kegiatan" class="form-label fw-bold text-blue mb-1">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Nama kegiatan" value="{{ request('nama_kegiatan') }}">
                    </div>

                    <div class="col-md-4">
                        <label for="uraian_jenis_barang" class="form-label fw-bold text-blue mb-1">Jenis Barang</label>
                        <input type="text" name="uraian_jenis_barang" id="uraian_jenis_barang" class="form-control" placeholder="Jenis barang" value="{{ request('uraian_jenis_barang') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="date_from" class="form-label fw-bold text-blue mb-1">Tanggal Dari</label>
                        <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="date_to" class="form-label fw-bold text-blue mb-1">Tanggal Sampai</label>
                        <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="saldo_awal_min" class="form-label fw-bold text-blue mb-1">Saldo Awal (Min)</label>
                        <input type="number" name="saldo_awal_min" id="saldo_awal_min" class="form-control" placeholder="Minimum" value="{{ request('saldo_awal_min') }}">
                    </div>

                    <div class="col-md-3">
                        <label for="saldo_awal_max" class="form-label fw-bold text-blue mb-1">Saldo Awal (Max)</label>
                        <input type="number" name="saldo_awal_max" id="saldo_awal_max" class="form-control" placeholder="Maksimum" value="{{ request('saldo_awal_max') }}">
                    </div>

                    <div class="col-md-12 d-flex gap-2 justify-content-end">
                        <button type="submit" class="btn btn-blue fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
                            </svg>
                            Terapkan Filter
                        </button>
                        <a href="{{ route('aset-lancars.index') }}" class="btn btn-outline-blue fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3"></path>
                                <path d="M18 13.3l-6.3 -6.3"></path>
                            </svg>
                            Reset Filter
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-blue-lt border-0">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div class="avatar avatar-sm bg-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                            <line x1="12" y1="12" x2="12" y2="21"></line>
                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                            <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="card-title mb-0 text-blue">Daftar Aset Lancar</h3>
                    <div class="text-muted small">Total {{ $asetLancars->total() }} item terdaftar</div>
                </div>
            </div>
        </div>

        @if ($asetLancars->count() > 0)
            <div class="table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead class="bg-blue text-white">
                        <tr>
                            <th rowspan="2" class="text-center align-middle" style="min-width: 60px;">No</th>
                            <th rowspan="2" class="align-middle" style="min-width: 160px;">Uraian Barang</th>
                            <th rowspan="2" class="align-middle" style="min-width: 200px;">Nama Kegiatan</th>
                            <th rowspan="2" class="align-middle" style="min-width: 200px;">Uraian Kegiatan</th>
                            <th rowspan="2" class="align-middle" style="min-width: 180px;">Uraian/Jenis Barang</th>
                            <th colspan="3" class="text-center" style="background-color: rgba(59, 130, 246, 0.8); border-left: 2px solid white;">Saldo Awal</th>
                            <th colspan="5" class="text-center" style="background-color: rgba(34, 197, 94, 0.8); border-left: 2px solid white;">Mutasi</th>
                            <th colspan="2" class="text-center" style="background-color: rgba(245, 158, 11, 0.8); border-left: 2px solid white;">Saldo Akhir</th>
                            <th rowspan="2" class="text-center align-middle" style="min-width: 120px;">Aksi</th>
                        </tr>
                        <tr>
                            <!-- Saldo Awal -->
                            <th class="text-center" style="min-width: 80px; background-color: rgba(59, 130, 246, 0.8);">Unit</th>
                            <th class="text-center" style="min-width: 120px; background-color: rgba(59, 130, 246, 0.8);">Harga Satuan</th>
                            <th class="text-center" style="min-width: 120px; background-color: rgba(59, 130, 246, 0.8);">Nilai Total</th>
                            <!-- Mutasi -->
                            <th class="text-center" style="min-width: 80px; background-color: rgba(34, 197, 94, 0.8);">Tambah</th>
                            <th class="text-center" style="min-width: 110px; background-color: rgba(34, 197, 94, 0.8);">Harga Satuan</th>
                            <th class="text-center" style="min-width: 110px; background-color: rgba(34, 197, 94, 0.8);">Nilai Total</th>
                            <th class="text-center" style="min-width: 80px; background-color: rgba(34, 197, 94, 0.8);">(Kurang)</th>
                            <th class="text-center" style="min-width: 110px; background-color: rgba(34, 197, 94, 0.8);">Nilai Total</th>
                            <!-- Saldo Akhir -->
                            <th class="text-center" style="min-width: 80px; background-color: rgba(245, 158, 11, 0.8);">Unit</th>
                            <th class="text-center" style="min-width: 120px; background-color: rgba(245, 158, 11, 0.8);">Nilai Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asetLancars as $index => $aset)
                            <tr class="hover-row">
                                <td class="text-center">
                                    <div class="badge bg-blue-lt text-blue fw-bold">
                                        {{ ($asetLancars->currentPage() - 1) * $asetLancars->perPage() + $index + 1 }}
                                    </div>
                                </td>
                                <td>
                                    <div class="badge bg-blue-lt text-blue fw-medium">
                                        {{ $aset->rekeningUraian->kode_rekening }} - {{ $aset->rekeningUraian->uraian }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark">{{ $aset->nama_kegiatan }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $aset->uraian_kegiatan ?? '-' }}</div>
                                    @if ($aset->uraian_kegiatan && strlen($aset->uraian_kegiatan) > 40)
                                        <small class="text-muted d-block">{{ Str::limit($aset->uraian_kegiatan, 40) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <div class="text-muted">{{ $aset->uraian_jenis_barang ?? '-' }}</div>
                                </td>

                                <!-- Saldo Awal -->
                                <td class="text-center" style="background-color: #f8fdff;">
                                    <span class="badge bg-blue text-white fw-bold">{{ number_format($aset->saldo_awal_unit) }}</span>
                                </td>
                                <td class="text-end" style="background-color: #f8fdff;">
                                    <div class="fw-medium font-mono">{{ 'Rp ' . number_format($aset->saldo_awal_harga_satuan, 0) }}</div>
                                </td>
                                <td class="text-end" style="background-color: #f8fdff;">
                                    <div class="fw-bold text-blue font-mono">{{ 'Rp ' . number_format($aset->saldo_awal_total, 0) }}</div>
                                </td>

                                <!-- Mutasi -->
                                <td class="text-center" style="background-color: #f0fdf4;">
                                    @if ($aset->mutasi_tambah_unit > 0)
                                        <span class="badge bg-success text-white fw-bold">+{{ number_format($aset->mutasi_tambah_unit) }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end" style="background-color: #f0fdf4;">
                                    @if ($aset->mutasi_tambah_harga_satuan > 0)
                                        <div class="fw-medium font-mono text-success">{{ 'Rp ' . number_format($aset->mutasi_tambah_harga_satuan, 0) }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end" style="background-color: #f0fdf4;">
                                    @if ($aset->mutasi_tambah_nilai_total > 0)
                                        <div class="fw-bold text-success font-mono">{{ 'Rp ' . number_format($aset->mutasi_tambah_nilai_total, 0) }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center" style="background-color: #f0fdf4;">
                                    @if ($aset->mutasi_kurang_unit > 0)
                                        <span class="badge bg-danger text-white fw-bold">-{{ number_format($aset->mutasi_kurang_unit) }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-end" style="background-color: #f0fdf4;">
                                    @if ($aset->mutasi_kurang_nilai_total > 0)
                                        <div class="fw-bold text-danger font-mono">{{ 'Rp ' . number_format($aset->mutasi_kurang_nilai_total, 0) }}</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>

                                <!-- Saldo Akhir -->
                                <td class="text-center" style="background-color: #fffbeb;">
                                    <span class="badge bg-warning text-white fw-bold">{{ number_format($aset->saldo_akhir_unit) }}</span>
                                </td>
                                <td class="text-end" style="background-color: #fffbeb;">
                                    <div class="fw-bold text-warning font-mono">{{ 'Rp ' . number_format($aset->saldo_akhir_total, 0) }}</div>
                                </td>

                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('aset-lancars.show', $aset) }}" class="btn btn-ghost-blue btn-md px-3 py-2" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('aset-lancars.edit', $aset) }}" class="btn btn-ghost-yellow btn-md px-3 py-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </a>
                                        <button class="btn btn-ghost-red btn-md px-3 py-2" onclick="confirmDelete('{{ route('aset-lancars.destroy', $aset->id) }}')" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-blue-lt">
                        <tr>
                            <th colspan="8" class="text-end fw-bold text-blue">Total Keseluruhan:</th>
                            <th class="text-end fw-bold text-blue">
                                {{ 'Rp ' . number_format($asetLancars->sum('saldo_awal_total'), 0) }}
                            </th>
                            <th colspan="2"></th>
                            <th class="text-end fw-bold text-success">
                                {{ 'Rp ' . number_format($asetLancars->sum('mutasi_tambah_nilai_total'), 0) }}
                            </th>
                            <th></th>
                            <th class="text-end fw-bold text-danger">
                                {{ 'Rp ' . number_format($asetLancars->sum('mutasi_kurang_nilai_total'), 0) }}
                            </th>
                            <th></th>
                            <th class="text-end fw-bold text-warning">
                                {{ 'Rp ' . number_format($asetLancars->sum('saldo_akhir_total'), 0) }}
                            </th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @if($asetLancars->hasPages())
                <div class="card-footer bg-blue-lt border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-blue" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                                    <line x1="12" y1="12" x2="20" y2="7.5"></line>
                                    <line x1="12" y1="12" x2="12" y2="21"></line>
                                    <line x1="12" y1="12" x2="4" y2="7.5"></line>
                                    <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                                </svg>
                                <span class="fw-medium">
                                    Menampilkan <span class="text-blue fw-bold">{{ $asetLancars->firstItem() }}</span> 
                                    sampai <span class="text-blue fw-bold">{{ $asetLancars->lastItem() }}</span> 
                                    dari <span class="text-blue fw-bold">{{ $asetLancars->total() }}</span> data
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex pagination-wrapper">
                                {{ $asetLancars->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="card-body">
                <div class="empty py-5">
                    <div class="empty-img">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="128" height="128" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3"></polyline>
                            <line x1="12" y1="12" x2="20" y2="7.5"></line>
                            <line x1="12" y1="12" x2="12" y2="21"></line>
                            <line x1="12" y1="12" x2="4" y2="7.5"></line>
                            <line x1="16" y1="5.25" x2="8" y2="9.75"></line>
                        </svg>
                    </div>
                    <p class="empty-title text-muted">Belum ada data aset lancar</p>
                    <p class="empty-subtitle text-muted">
                        Mulai dengan menambahkan aset lancar pertama untuk organisasi Anda
                    </p>
                    <div class="empty-action">
                        <a href="{{ route('aset-lancars.create') }}" class="btn btn-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Tambah Aset Lancar Pertama
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle mb-2 text-danger icon-lg" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <h3>Konfirmasi Hapus</h3>
                <div class="text-muted">
                    Apakah Anda yakin ingin menghapus data aset lancar ini? Data yang sudah dihapus tidak dapat dikembalikan.
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-white w-100" data-bs-dismiss="modal">
                                Batal
                            </button>
                        </div>
                        <div class="col">
                            <form id="delete-form" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
$(document).ready(function() {
    function updateExportForm() {
        $('#export_search').val($('#search').val() || '');
        $('#export_rekening_uraian_id').val($('#rekening_uraian_id').val() || '');
        $('#export_nama_kegiatan').val($('#nama_kegiatan').val() || '');
        $('#export_uraian_jenis_barang').val($('#uraian_jenis_barang').val() || '');
        $('#export_date_from').val($('#date_from').val() || '');
        $('#export_date_to').val($('#date_to').val() || '');
        $('#export_saldo_awal_min').val($('#saldo_awal_min').val() || '');
        $('#export_saldo_awal_max').val($('#saldo_awal_max').val() || '');
        
        // Update button appearance
        const hasFilters = $('#search').val() || $('#rekening_uraian_id').val() || $('#nama_kegiatan').val() || 
                          $('#uraian_jenis_barang').val() || $('#date_from').val() || $('#date_to').val() || 
                          $('#saldo_awal_min').val() || $('#saldo_awal_max').val();
        const $btn = $('#exportFormBtn');
        
        if (hasFilters) {
            $btn.removeClass('btn-outline-blue').addClass('btn-outline-success');
            $btn.html($btn.html().replace('Export Excel', 'Export Excel (Filtered)'));
        } else {
            $btn.removeClass('btn-outline-success').addClass('btn-outline-blue');
            $btn.html($btn.html().replace('Export Excel (Filtered)', 'Export Excel'));
        }
    }
    
    // Update when filters change
    $('#search, #rekening_uraian_id, #nama_kegiatan, #uraian_jenis_barang, #date_from, #date_to, #saldo_awal_min, #saldo_awal_max').on('change input', updateExportForm);
    updateExportForm(); // Initial call
    
    // Add loading state on form submit
    $('form').on('submit', function() {
        const $btn = $(this).find('#exportFormBtn');
        if ($btn.length) {
            $btn.html('<div class="spinner-border spinner-border-sm me-2"></div>Exporting...')
                 .prop('disabled', true);
        }
    });
});

function confirmDelete(url) {
    if (confirm('⚠️ Apakah Anda yakin ingin menghapus aset lancar ini?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait aset lancar ini.')) {
        const form = document.getElementById('delete-form');
        if (form) {
            form.action = url;
            form.submit();
        }
    }
}

// Enhanced table interactions
$(document).ready(function() {
    // Add hover effects for better UX
    $('.hover-row').hover(
        function() {
            $(this).addClass('table-active');
        },
        function() {
            $(this).removeClass('table-active');
        }
    );

    // Auto dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert-dismissible').fadeOut('slow');
    }, 5000);

    // Smooth scroll to top when pagination is clicked
    $('.pagination a').on('click', function() {
        const cardElement = $('.card');
        if (cardElement.length) {
            $('html, body').animate({
                scrollTop: cardElement.offset().top - 20
            }, 500);
        }
    });
    
    // Add loading state to form submissions
    $('form').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        if (submitBtn.length) {
            submitBtn.prop('disabled', true);
            const originalText = submitBtn.html();
            submitBtn.html('<div class="spinner-border spinner-border-sm me-2" role="status"></div>Processing...');
            
            // Reset after 10 seconds as fallback
            setTimeout(() => {
                submitBtn.prop('disabled', false);
                submitBtn.html(originalText);
            }, 10000);
        }
    });

    // Enable tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush

@push('page-styles')
<style>
/* Blue Light Theme Styling */
:root {
    --blue-primary: #2563eb;
    --blue-secondary: #3b82f6;
    --blue-light: #dbeafe;
    --blue-extra-light: #eff6ff;
    --blue-dark: #1e40af;
    --shadow-light: 0 1px 3px 0 rgba(59, 130, 246, 0.1), 0 1px 2px 0 rgba(59, 130, 246, 0.06);
    --shadow-medium: 0 4px 6px -1px rgba(59, 130, 246, 0.1), 0 2px 4px -1px rgba(59, 130, 246, 0.06);
    --shadow-large: 0 10px 15px -3px rgba(59, 130, 246, 0.1), 0 4px 6px -2px rgba(59, 130, 246, 0.05);
    --gradient-blue: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
    --border-radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced Card Styling */
.card {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-large);
    background: white;
    overflow: hidden;
    transition: var(--transition);
}

.card:hover {
    box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.1), 0 10px 10px -5px rgba(59, 130, 246, 0.04);
    transform: translateY(-2px);
}

.card-header {
    background: var(--gradient-blue);
    border: none;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
}

.card-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--blue-primary), var(--blue-secondary));
}

/* Modern Table Styling */
.table-responsive {
    border-radius: 0 0 var(--border-radius) var(--border-radius);
    overflow-x: auto;
    background: white;
}

.table {
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    min-width: 1800px;
}

.table thead th {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    color: white;
    font-weight: 600;
    font-size: 0.875rem;
    letter-spacing: 0.025em;
    padding: 1rem 0.75rem;
    border: none;
    position: sticky;
    top: 0;
    z-index: 10;
    white-space: nowrap;
    text-transform: uppercase;
    box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
}

.table thead th:first-child {
    border-radius: var(--border-radius) 0 0 0;
}

.table thead th:last-child {
    border-radius: 0 var(--border-radius) 0 0;
}

.table tbody tr {
    transition: var(--transition);
    border-bottom: 1px solid #f1f5f9;
}

.table tbody tr:hover {
    background: var(--blue-extra-light);
    transform: scale(1.001);
    box-shadow: var(--shadow-light);
}

.table tbody tr:nth-child(even) {
    background-color: #fafbff;
}

.table tbody tr:nth-child(even):hover {
    background: var(--blue-extra-light);
}

.table tbody td {
    padding: 1rem 0.75rem;
    vertical-align: middle;
    border: none;
    font-size: 0.875rem;
    white-space: nowrap;
}

.table tfoot th {
    background: var(--gradient-blue);
    color: var(--blue-dark);
    font-weight: 600;
    padding: 1rem 0.75rem;
    border: none;
    font-size: 0.875rem;
}

/* Enhanced Badge Styling */
.badge {
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.75rem;
    letter-spacing: 0.025em;
    text-transform: uppercase;
    box-shadow: var(--shadow-light);
    transition: var(--transition);
}

.badge:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-medium);
}

.bg-blue-lt {
    background-color: var(--blue-light) !important;
    color: var(--blue-dark) !important;
}

.bg-blue {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%) !important;
    color: white !important;
}

.badge.bg-success {
    background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%) !important;
    color: white !important;
}

.badge.bg-warning {
    background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%) !important;
    color: white !important;
}

.badge.bg-danger {
    background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%) !important;
    color: white !important;
}

/* Button Enhancements */
.btn {
    border-radius: 8px;
    font-weight: 500;
    letter-spacing: 0.025em;
    transition: var(--transition);
    border: none;
    box-shadow: var(--shadow-light);
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-medium);
}

.btn-blue {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    color: white;
}

.btn-blue:hover {
    background: linear-gradient(135deg, var(--blue-dark) 0%, var(--blue-primary) 100%);
    color: white;
}

.btn-outline-blue {
    border: 2px solid var(--blue-primary);
    color: var(--blue-primary);
    background: transparent;
}

.btn-outline-blue:hover {
    background: var(--blue-primary);
    color: white;
}

.btn-outline-success {
    border: 2px solid #16a34a;
    color: #16a34a;
    background: transparent;
}

.btn-outline-success:hover {
    background: #16a34a;
    color: white;
}

.btn-ghost-blue {
    background: var(--blue-extra-light);
    color: var(--blue-primary);
    border: 1px solid var(--blue-light);
}

.btn-ghost-blue:hover {
    background: var(--blue-light);
    color: var(--blue-dark);
    border-color: var(--blue-primary);
}

.btn-ghost-yellow {
    background: #fef3c7;
    color: #d97706;
    border: 1px solid #fcd34d;
}

.btn-ghost-yellow:hover {
    background: #fcd34d;
    color: #92400e;
}

.btn-ghost-red {
    background: #fee2e2;
    color: #dc2626;
    border: 1px solid #fca5a5;
}

.btn-ghost-red:hover {
    background: #fca5a5;
    color: #991b1b;
}

/* Avatar Styling */
.avatar {
    border-radius: 12px;
    box-shadow: var(--shadow-light);
    transition: var(--transition);
}

.avatar:hover {
    transform: scale(1.05);
    box-shadow: var(--shadow-medium);
}

/* Alert Enhancements */
.alert {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-medium);
    border-left: 4px solid;
}

.alert-success {
    background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
    border-left-color: #16a34a;
    color: #166534;
}

.alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    border-left-color: #dc2626;
    color: #991b1b;
}

/* Empty State Styling */
.empty {
    padding: 4rem 2rem;
    text-align: center;
}

.empty-img svg {
    opacity: 0.6;
    transition: var(--transition);
}

.empty:hover .empty-img svg {
    opacity: 0.8;
    transform: scale(1.05);
}

/* Footer Styling */
.card-footer {
    background: var(--gradient-blue);
    border: none;
    padding: 1.5rem;
}

/* Pagination Styling */
.pagination {
    margin: 0;
}

.page-link {
    border: none;
    border-radius: 8px;
    margin: 0 0.125rem;
    color: var(--blue-primary);
    background: white;
    box-shadow: var(--shadow-light);
    transition: var(--transition);
    font-weight: 500;
}

.page-link:hover {
    background: var(--blue-light);
    color: var(--blue-dark);
    transform: translateY(-1px);
    box-shadow: var(--shadow-medium);
}

.page-item.active .page-link {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    border-color: var(--blue-primary);
    box-shadow: var(--shadow-medium);
}

/* Text Colors */
.text-blue {
    color: var(--blue-primary) !important;
}

.text-success {
    color: #16a34a !important;
}

.text-warning {
    color: #d97706 !important;
}

.text-danger {
    color: #dc2626 !important;
}

/* Form Controls */
.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    transition: var(--transition);
}

.form-control:focus, .form-select:focus {
    border-color: var(--blue-primary);
    box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
}

.input-group-text {
    border-radius: 8px 0 0 8px;
    border: 1px solid #e2e8f0;
}

/* Modal Enhancements */
.modal-content {
    border-radius: var(--border-radius);
    border: none;
    box-shadow: var(--shadow-large);
}

.modal-header {
    border-bottom: 1px solid var(--blue-light);
}

.modal-footer {
    border-top: 1px solid var(--blue-light);
}

/* Responsive Enhancements */
@media (max-width: 768px) {
    .table {
        font-size: 0.75rem;
        min-width: 1400px;
    }
    
    .table th,
    .table td {
        padding: 0.5rem 0.375rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .badge {
        padding: 0.25rem 0.5rem;
        font-size: 0.65rem;
    }
}

/* Scrollbar Styling */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: var(--blue-extra-light);
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--blue-light) 0%, var(--blue-primary) 100%);
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-dark) 100%);
}

/* Loading Animation */
@keyframes shimmer {
    0% { background-position: -200px 0; }
    100% { background-position: calc(200px + 100%) 0; }
}

.loading-shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200px 100%;
    animation: shimmer 1.5s infinite;
}

/* Print Styles */
@media print {
    .card {
        box-shadow: none;
        border: 1px solid #ddd;
    }
    
    .btn, .dropdown {
        display: none !important;
    }
    
    .table {
        font-size: 0.75rem;
    }
}

/* Utility Classes */
.font-mono {
    font-family: 'SF Mono', Monaco, 'Cascadia Code', 'Roboto Mono', Consolas, 'Courier New', monospace;
}

.fw-bold {
    font-weight: 700;
}

.fw-medium {
    font-weight: 500;
}
</style>
@endpush