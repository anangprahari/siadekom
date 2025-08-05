@extends('layouts.tabler')

@section('content')
    <div class="container-fluid p-1">
        <div class="page-header d-print-none mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="avatar avatar-lg bg-blue-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                    <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                    <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="page-title mb-0">Manajemen Aset</h2>
                            <div class="text-muted mt-1">Kelola dan pantau seluruh aset Diskominfo</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <form action="{{ route('asets.export') }}" method="GET" style="display: inline-block;">
                            <input type="hidden" name="search" id="export_search" value="{{ request('search') }}">
                            <input type="hidden" name="tahun_perolehan" id="export_tahun_perolehan"
                                value="{{ request('tahun_perolehan') }}">
                            <input type="hidden" name="keadaan_barang" id="export_keadaan_barang"
                                value="{{ request('keadaan_barang') }}">
                            <button type="submit" class="btn btn-outline-blue d-none d-md-inline-block" id="exportFormBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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

                        <a href="{{ route('asets.create') }}" class="btn btn-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
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

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                <div class="d-flex">
                    <div class="me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-success" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                <div class="d-flex">
                    <div class="me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-danger" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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

        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('asets.index') }}">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-6">
                            <label for="search" class="form-label fw-bold text-blue mb-1">Pencarian</label>
                            <div class="input-group">
                                <span class="input-group-text bg-blue-lt text-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </span>
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Cari nama barang, kode, atau register..."
                                    value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_perolehan" class="form-label fw-bold text-blue mb-1">Tahun Perolehan</label>
                            <select name="tahun_perolehan" id="tahun_perolehan" class="form-select">
                                <option value="">Semua Tahun</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}"
                                        {{ request('tahun_perolehan') == $year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-blue mb-1">Rentang Tahun Perolehan</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <select name="tahun_dari" id="tahun_dari" class="form-select">
                                        <option value="">Dari Tahun</option>
                                        @for ($year = 1990; $year <= date('Y'); $year++)
                                            <option value="{{ $year }}"
                                                {{ request('tahun_dari') == $year ? 'selected' : '' }}>{{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="tahun_sampai" id="tahun_sampai" class="form-select">
                                        <option value="">Sampai Tahun</option>
                                        @for ($year = 1990; $year <= date('Y'); $year++)
                                            <option value="{{ $year }}"
                                                {{ request('tahun_sampai') == $year ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="keadaan_barang" class="form-label fw-bold text-blue mb-1">Keadaan Barang</label>
                            <select name="keadaan_barang" id="keadaan_barang" class="form-select">
                                <option value="">Semua Keadaan</option>
                                <option value="Baik" {{ request('keadaan_barang') == 'Baik' ? 'selected' : '' }}>Baik
                                </option>
                                <option value="Kurang Baik"
                                    {{ request('keadaan_barang') == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                <option value="Rusak Berat"
                                    {{ request('keadaan_barang') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn-blue w-100 fw-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                Cari / Filter
                            </button>
                            <a href="{{ route('asets.index') }}" class="btn btn-outline-blue w-100 fw-bold">Reset</a>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 11l3 3l8 -8"></path>
                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12c0 -1.1 .9 -2 2 -2h9"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="card-title mb-0 text-blue">Daftar Seluruh Aset</h3>
                        <div class="text-muted small">Total {{ $asets->total() }} item terdaftar</div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead class="bg-blue text-white">
                        <tr>
                            <th class="text-center" style="min-width: 60px;">No</th>
                            <th style="min-width: 180px;">Nama Bidang Barang</th>
                            <th style="min-width: 120px;">Kode Barang</th>
                            <th style="min-width: 100px;">Register</th>
                            <th style="min-width: 200px;">Nama Jenis Barang</th>
                            <th style="min-width: 150px;">Merk / Type</th>
                            <th style="min-width: 140px;">No. Sertifikat</th>
                            <th style="min-width: 140px;">No. Plat Kendaraan</th>
                            <th style="min-width: 120px;">No. Pabrik</th>
                            <th style="min-width: 120px;">No. Casis</th>
                            <th style="min-width: 120px;">Bahan</th>
                            <th style="min-width: 150px;">Asal Perolehan</th>
                            <th class="text-center" style="min-width: 120px;">Tahun Perolehan</th>
                            <th style="min-width: 180px;">Ukuran Barang / Konstruksi</th>
                            <th class="text-center" style="min-width: 100px;">Satuan</th>
                            <th class="text-center" style="min-width: 120px;">Keadaan Barang</th>
                            <th class="text-center" style="min-width: 110px;">Jumlah Barang</th>
                            <th class="text-end" style="min-width: 140px;">Harga Satuan</th>
                            <th class="text-end" style="min-width: 140px;">Total Harga</th>
                            <th class="text-center" style="min-width: 120px;">Bukti Barang</th>
                            <th class="text-center" style="min-width: 120px;">Bukti Berita</th>
                            <th class="text-center" style="min-width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($asets as $index => $aset)
                            <tr class="hover-row">
                                <td class="text-center">
                                    <div class="badge bg-blue-lt text-blue fw-bold">
                                        {{ ($asets->currentPage() - 1) * $asets->perPage() + $index + 1 }}
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark">{{ $aset->nama_bidang_barang }}</div>
                                </td>
                                <td>
                                    <span class="detail-value font-mono">{{ $aset->kode_barang }}</span>
                                </td>
                                <td>
                                    <span class="detail-value font-mono">{{ $aset->register }}</span>
                                </td>
                                <td>
                                    <div class="detail-value font-mono">{{ $aset->nama_jenis_barang }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $aset->merk_type ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="text-muted font-mono">{{ $aset->no_sertifikat ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="text-muted font-mono">{{ $aset->no_plat_kendaraan ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="text-muted font-mono">{{ $aset->no_pabrik ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="text-muted font-mono">{{ $aset->no_casis ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $aset->bahan ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="fw-medium">{{ $aset->asal_perolehan }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="detail-value font-mono">{{ $aset->tahun_perolehan }}</span>
                                </td>
                                <td>
                                    <div class="text-muted small">{{ $aset->ukuran_barang_konstruksi ?? '-' }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="detail-value font-mono">{{ $aset->satuan }}</span>
                                </td>
                                <td class="text-center">
                                    <span
                                        class="badge bg-{{ $aset->keadaan_barang === 'Baik' ? 'success' : ($aset->keadaan_barang === 'Kurang Baik' ? 'warning' : 'danger') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16"
                                            height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            @if ($aset->keadaan_barang === 'Baik')
                                                <path d="m9 12 2 2 4-4"></path>
                                            @elseif($aset->keadaan_barang === 'Kurang Baik')
                                                <path d="M12 9v4"></path>
                                                <path d="m12 16 .01 0"></path>
                                            @else
                                                <path d="m15 9-6 6"></path>
                                                <path d="m9 9 6 6"></path>
                                            @endif
                                        </svg>
                                        {{ $aset->keadaan_barang }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="detail-value font-mono">{{ $aset->jumlah_barang }}</div>
                                </td>
                                <td class="text-end">
                                    <div class="fw-medium font-mono">{{ $aset->formatted_harga }}</div>
                                </td>
                                <td class="text-end">
                                    <div class="fw-bold text-success font-mono">{{ $aset->formatted_total_harga }}</div>
                                </td>
                                <td class="text-center">
                                    @if ($aset->bukti_barang_url)
                                        <a href="{{ $aset->bukti_barang_url }}" target="_blank"
                                            class="btn btn-ghost-blue btn-md px-3 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                <path
                                                    d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                </path>
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($aset->bukti_berita_url)
                                        <a href="{{ $aset->bukti_berita_url }}" target="_blank"
                                            class="btn btn-ghost-blue btn-md px-3 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11">
                                                </path>
                                                <line x1="8" y1="8" x2="12" y2="8">
                                                </line>
                                                <line x1="8" y1="12" x2="12" y2="12">
                                                </line>
                                            </svg>
                                            Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('asets.show', $aset->id) }}"
                                            class="btn btn-ghost-blue btn-md px-3 py-2" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('asets.edit', $aset->id) }}"
                                            class="btn btn-ghost-yellow btn-md px-3 py-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                </path>
                                                <path d="M16 5l3 3"></path>
                                            </svg>
                                        </a>
                                        <button class="btn btn-ghost-red btn-md px-3 py-2"
                                            onclick="confirmDelete('{{ route('asets.destroy', $aset->id) }}')"
                                            title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7">
                                                </line>
                                                <line x1="10" y1="11" x2="10" y2="17">
                                                </line>
                                                <line x1="14" y1="11" x2="14" y2="17">
                                                </line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                        <a href="{{ route('asets.downloadPdf', $aset->id) }}"
                                            class="btn btn-ghost-purple btn-md px-3 py-2" title="Download PDF">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 3v12m0 0l-4-4m4 4l4-4" />
                                                <rect x="4" y="17" width="16" height="4" rx="2" />
                                            </svg>
                                            Download PDF
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="22">
                                    <div class="empty py-5">
                                        <div class="empty-img">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue"
                                                width="128" height="128" viewBox="0 0 24 24" stroke-width="1"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                            </svg>
                                        </div>
                                        <p class="empty-title text-muted">Belum ada data aset</p>
                                        <p class="empty-subtitle text-muted">
                                            Mulai dengan menambahkan aset pertama untuk organisasi Anda
                                        </p>
                                        <div class="empty-action">
                                            <a href="{{ route('asets.create') }}" class="btn btn-blue">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20"
                                                    height="20" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="12" y1="5" x2="12" y2="19">
                                                    </line>
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                </svg>
                                                Tambah Aset Pertama
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($asets->hasPages())
                <div class="card-footer bg-blue-lt border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-blue" width="20"
                                    height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 11l3 3l8 -8"></path>
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12c0 -1.1 .9 -2 2 -2h9"></path>
                                </svg>
                                <span class="fw-medium">
                                    Menampilkan <span class="text-blue fw-bold">{{ $asets->firstItem() }}</span>
                                    sampai <span class="text-blue fw-bold">{{ $asets->lastItem() }}</span>
                                    dari <span class="text-blue fw-bold">{{ $asets->total() }}</span> data
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex pagination-wrapper">
                                {{ $asets->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function() {
            function updateExportForm() {
                $('#export_search').val($('#search').val() || '');
                $('#export_tahun_perolehan').val($('#tahun_perolehan').val() || '');
                $('#export_keadaan_barang').val($('#keadaan_barang').val() || '');

                // Update button appearance
                const hasFilters = $('#search').val() || $('#tahun_perolehan').val() || $('#keadaan_barang').val();
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
            $('#search, #tahun_perolehan, #keadaan_barang').on('change input', updateExportForm);
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
            if (confirm(
                    '⚠️ Apakah Anda yakin ingin menghapus aset ini?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait aset ini.'
                )) {
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
                    submitBtn.html(
                        '<div class="spinner-border spinner-border-sm me-2" role="status"></div>Processing...'
                    );

                    // Reset after 10 seconds as fallback
                    setTimeout(() => {
                        submitBtn.prop('disabled', false);
                        submitBtn.html(originalText);
                    }, 10000);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tahunPerolehan = document.getElementById('tahun_perolehan');
            const tahunDari = document.getElementById('tahun_dari');
            const tahunSampai = document.getElementById('tahun_sampai');

            // Fungsi untuk clear filter yang bertentangan
            function clearConflictingFilters(currentFilter) {
                if (currentFilter === 'single') {
                    // Jika memilih tahun tunggal, clear rentang tahun
                    tahunDari.value = '';
                    tahunSampai.value = '';
                } else if (currentFilter === 'range') {
                    // Jika memilih rentang tahun, clear tahun tunggal
                    tahunPerolehan.value = '';
                }
            }

            // Event listeners
            tahunPerolehan.addEventListener('change', function() {
                if (this.value !== '') {
                    clearConflictingFilters('single');
                }
            });

            tahunDari.addEventListener('change', function() {
                if (this.value !== '') {
                    clearConflictingFilters('range');
                }
            });

            tahunSampai.addEventListener('change', function() {
                if (this.value !== '') {
                    clearConflictingFilters('range');
                }
            });

            // Validasi rentang tahun
            function validateYearRange() {
                const dari = parseInt(tahunDari.value);
                const sampai = parseInt(tahunSampai.value);

                if (dari && sampai && dari > sampai) {
                    alert('Tahun dari tidak boleh lebih besar dari tahun sampai!');
                    tahunSampai.value = '';
                    return false;
                }
                return true;
            }

            tahunSampai.addEventListener('change', validateYearRange);
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
            min-width: 2000px;
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

        .bg-azure-lt {
            background-color: #e0f2fe !important;
            color: #0277bd !important;
        }

        .bg-cyan-lt {
            background-color: #e0f7fa !important;
            color: #00695c !important;
        }

        .bg-indigo-lt {
            background-color: #e8eaf6 !important;
            color: #3f51b5 !important;
        }

        .bg-teal-lt {
            background-color: #e0f2f1 !important;
            color: #00695c !important;
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

        .bg-blue {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%) !important;
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

        /* Dropdown Enhancements */
        .dropdown-menu {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.25rem;
            transition: var(--transition);
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--blue-light);
            color: var(--blue-dark);
            transform: translateX(4px);
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

        /* Enhanced Status Icons */
        .badge svg {
            width: 14px;
            height: 14px;
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

        #exportBtn.disabled {
            pointer-events: none;
            opacity: 0.6;
        }

        .btn-outline-success:hover {
            background-color: #198754;
            border-color: #198754;
            color: #fff;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .table {
                font-size: 0.75rem;
            }

            .table th,
            .table td {
                padding: 0.5rem 0.375rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
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
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: calc(200px + 100%) 0;
            }
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

            .btn,
            .dropdown {
                display: none !important;
            }

            .table {
                font-size: 0.75rem;
            }
        }
    </style>
@endpush
