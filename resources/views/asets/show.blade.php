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
                                <circle cx="12" cy="12" r="2"></circle>
                                <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="page-title mb-0">Detail Aset</h2>
                        <div class="text-muted mt-1">Informasi lengkap aset {{ $aset->nama_jenis_barang }}</div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    <a href="{{ route('asets.index') }}" class="btn btn-outline-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12,19 5,12 12,5"></polyline>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <a href="{{ route('asets.edit', $aset->id) }}" class="btn btn-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                            <path d="M16 5l3 3"></path>
                        </svg>
                        Edit Aset
                    </a>
                    <a href="{{ route('asets.downloadPdf', $aset->id) }}" class="btn btn-purple">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 3v12m0 0l-4-4m4 4l4-4"/>
                            <rect x="4" y="17" width="16" height="4" rx="2"/>
                        </svg>
                        Download PDF
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
                            <div class="text-white text-opacity-75 small">Detail identitas dan spesifikasi barang</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Nama Bidang Barang</label>
                                <div class="detail-value font-mono">{{ $aset->nama_bidang_barang }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Nama Jenis Barang</label>
                                <div class="detail-value font-mono">{{ $aset->nama_jenis_barang }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Kode Barang</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->kode_barang }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Register</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->register }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Merk / Type</label>
                                <div class="detail-value font-mono">{{ $aset->merk_type ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Bahan</label>
                                <div class="detail-value font-mono">{{ $aset->bahan ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Details Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                                <path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2"></path>
                                <path d="M19 11h2m-1 -1v2"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Spesifikasi Teknis</h3>
                            <div class="text-white text-opacity-75 small">Nomor identifikasi dan spesifikasi teknis</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">No. Sertifikat</label>
                                <div class="detail-value font-mono">{{ $aset->no_sertifikat ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">No. Plat Kendaraan</label>
                                <div class="detail-value font-mono">{{ $aset->no_plat_kendaraan ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">No. Pabrik</label>
                                <div class="detail-value font-mono">{{ $aset->no_pabrik ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">No. Casis</label>
                                <div class="detail-value font-mono">{{ $aset->no_casis ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="detail-label">Ukuran Barang / Konstruksi</label>
                                <div class="detail-value">{{ $aset->ukuran_barang_konstruksi ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acquisition & Condition Card -->
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
                            <h3 class="card-title mb-0">Perolehan & Kondisi</h3>
                            <div class="text-white text-opacity-75 small">Informasi asal perolehan dan kondisi barang</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Asal Perolehan</label>
                                <div class="detail-value font-mono">{{ $aset->asal_perolehan }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Tahun Perolehan</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->tahun_perolehan }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Keadaan Barang</label>
                                <div class="detail-value">
                                    <span class="badge bg-{{ $aset->keadaan_barang === 'Baik' ? 'success' : ($aset->keadaan_barang === 'Kurang Baik' ? 'warning' : 'danger') }} fs-6 px-3 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            @if($aset->keadaan_barang === 'Baik')
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="detail-label">Satuan</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->satuan }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Information Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"></path>
                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Informasi Finansial</h3>
                            <div class="text-white text-opacity-75 small">Harga dan nilai aset</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="detail-item">
                                <label class="detail-label">Jumlah Barang</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->jumlah_barang }}</span>
                                    <span class="detail-value font-mono">{{ $aset->satuan }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-item">
                                <label class="detail-label">Harga Satuan</label>
                                <div class="detail-value">
                                    <span class="detail-value font-mono">{{ $aset->formatted_harga }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-item">
                                <label class="detail-label">Total Harga</label>
                                <div class="detail-value">
                                    <span class="fw-bold text-success font-mono">{{ $aset->formatted_total_harga }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Asset Hierarchy Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                <line x1="9" y1="12" x2="9.01" y2="12"></line>
                                <line x1="13" y1="12" x2="15" y2="12"></line>
                                <line x1="9" y1="16" x2="9.01" y2="16"></line>
                                <line x1="13" y1="16" x2="15" y2="16"></line>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Hierarki Klasifikasi</h3>
                            <div class="text-white text-opacity-75 small">Struktur kategori aset</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="hierarchy-tree">
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-1">
                                <span class="hierarchy-icon bg-blue">1</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Akun</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->kelompok->akun->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-2">
                                <span class="hierarchy-icon bg-cyan">2</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Kelompok</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->kelompok->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->kelompok->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-3">
                                <span class="hierarchy-icon bg-teal">3</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Jenis</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->jenis->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-4">
                                <span class="hierarchy-icon bg-green">4</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Objek</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->objek->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-5">
                                <span class="hierarchy-icon bg-orange">5</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Rincian Objek</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->rincianObjek->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-6">
                                <span class="hierarchy-icon bg-red">6</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Sub Rincian Objek</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->subRincianObjek->nama }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->subRincianObjek->kode }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="hierarchy-item">
                            <div class="hierarchy-level level-7">
                                <span class="hierarchy-icon bg-purple">7</span>
                                <div class="hierarchy-content">
                                    <div class="hierarchy-title">Sub Sub Rincian Objek</div>
                                    <div class="hierarchy-name">{{ $aset->subSubRincianObjek->nama_barang }}</div>
                                    <div class="hierarchy-code">{{ $aset->subSubRincianObjek->kode }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Asset Image Card -->
            @if($aset->bukti_barang_url)
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="4" y="4" width="16" height="12" rx="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21,15 16,10 5,21"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Foto Barang</h3>
                            <div class="text-white text-opacity-75 small">Dokumentasi visual aset</div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="asset-image-container position-relative">
                        <img src="{{ $aset->bukti_barang_url }}" 
                             alt="Foto {{ $aset->nama_jenis_barang }}" 
                             class="asset-image w-100" 
                             style="height: 300px; object-fit: cover; border-radius: 0 0 12px 12px;"
                             data-bs-toggle="modal" 
                             data-bs-target="#imageModal"
                             onclick="showImageModal('{{ $aset->bukti_barang_url }}', '{{ $aset->nama_jenis_barang }}')">
                        <div class="image-overlay">
                            <div class="image-overlay-content">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-white mb-2" width="48" height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                                <div class="text-white fw-bold">Klik untuk memperbesar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Documents Card -->
            <div class="card mb-4 shadow-lg">
                <div class="card-header bg-gradient-blue text-white">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm bg-white bg-opacity-20 me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <line x1="9" y1="9" x2="10" y2="9"></line>
                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                <line x1="9" y1="17" x2="15" y2="17"></line>
                            </svg>
                        </div>
                        <div>
                            <h3 class="card-title mb-0">Dokumen Pendukung</h3>
                            <div class="text-white text-opacity-75 small">File dan lampiran terkait</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <!-- Bukti Barang -->
                        <div class="list-group-item d-flex align-items-center justify-content-between px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm bg-blue-lt text-blue me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="4" width="16" height="12" rx="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21,15 16,10 5,21"></polyline>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fw-medium">Foto Barang</div>
                                    <div class="text-muted small">Dokumentasi visual aset</div>
                                </div>
                            </div>
                            <div>
                                @if($aset->bukti_barang_url)
                                    <a href="{{ $aset->bukti_barang_url }}" target="_blank" class="btn btn-outline-blue btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"></path>
                                        </svg>
                                        Lihat
                                    </a>
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </div>
                        </div>

                        <!-- Bukti Berita -->
                        <div class="list-group-item d-flex align-items-center justify-content-between px-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm bg-red-lt text-red me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                                        <line x1="8" y1="8" x2="12" y2="8"></line>
                                        <line x1="8" y1="12" x2="12" y2="12"></line>
                                    </svg>
                                </div>
                                <div>
                                    <div class="fw-medium">Dokumen Berita Acara</div>
                                    <div class="text-muted small">File PDF dokumen pendukung</div>
                                </div>
                            </div>
                            <div>
                                @if($aset->bukti_berita_url)
                                    <a href="{{ $aset->bukti_berita_url }}" target="_blank" class="btn btn-outline-red btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 3v12"></path>
                                            <path d="M8 11l4 4 4-4"></path>
                                            <path d="M8 4l4 4 4-4"></path>
                                        </svg>
                                        Download
                                    </a>
                                @else
                                    <span class="badge bg-secondary">Tidak ada</span>
                                @endif
                            </div>
                        </div>
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
                            <div class="text-white text-opacity-75 small">Aksi yang tersedia</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('asets.edit', $aset->id) }}" class="btn btn-outline-yellow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                <path d="M16 5l3 3"></path>
                            </svg>
                            Edit Data Aset
                        </a>
                        <a href="{{ route('asets.downloadPdf', $aset->id) }}" class="btn btn-outline-purple">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 3v12m0 0l-4-4m4 4l4-4"/>
                                <rect x="4" y="17" width="16" height="4" rx="2"/>
                            </svg>
                            Download Laporan PDF
                        </a>
                        <button class="btn btn-outline-danger" onclick="confirmDelete('{{ route('asets.destroy', $aset->id) }}')">
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

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="imageModalLabel">Foto Aset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="modalImage" src="" alt="Asset Image" class="w-100" style="max-height: 70vh; object-fit: contain;">
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a id="downloadImageBtn" href="" download class="btn btn-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 3v12m0 0l-4-4m4 4l4-4"/>
                        <rect x="4" y="17" width="16" height="4" rx="2"/>
                    </svg>
                    Download Gambar
                </a>
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
<script>
// Image Modal Functions
function showImageModal(imageUrl, assetName) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('imageModalLabel').textContent = 'Foto ' + assetName;
    document.getElementById('downloadImageBtn').href = imageUrl;
}

// Delete Confirmation
function confirmDelete(url) {
    if (confirm('⚠️ Apakah Anda yakin ingin menghapus aset ini?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait aset ini.')) {
        const form = document.getElementById('delete-form');
        if (form) {
            form.action = url;
            form.submit();
        }
    }
}

// Enhanced interactions
$(document).ready(function() {
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
        if (!$btn.hasClass('btn-close') && !$btn.attr('data-bs-dismiss')) {
            const originalText = $btn.html();
            $btn.prop('disabled', true);
            
            // Add loading spinner
            if ($btn.text().includes('Download') || $btn.text().includes('Edit')) {
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

    // Add hover effects for hierarchy items
    $('.hierarchy-level').hover(
        function() {
            $(this).addClass('hierarchy-hover');
        },
        function() {
            $(this).removeClass('hierarchy-hover');
        }
    );
});

// Print functionality
function printAssetDetails() {
    window.print();
}

// Copy asset details to clipboard
function copyAssetDetails() {
    const assetInfo = `
Nama Barang: {{ $aset->nama_jenis_barang }}
Kode Barang: {{ $aset->kode_barang }}
Register: {{ $aset->register }}
Kondisi: {{ $aset->keadaan_barang }}
Harga: {{ $aset->formatted_total_harga }}
    `;
    
    navigator.clipboard.writeText(assetInfo).then(function() {
        // Show success message
        showToast('success', 'Detail aset berhasil disalin ke clipboard!');
    }).catch(function(err) {
        console.error('Error copying text: ', err);
        showToast('error', 'Gagal menyalin detail aset');
    });
}

// Toast notification function
function showToast(type, message) {
    // Create toast element
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

/* Hierarchy Tree Styling */
.hierarchy-tree {
    padding: 0;
}

.hierarchy-item {
    border-bottom: 1px solid #e2e8f0;
}

.hierarchy-item:last-child {
    border-bottom: none;
}

.hierarchy-level {
    display: flex;
    align-items: center;
    padding: 1rem 1.5rem;
    transition: var(--transition);
    position: relative;
}

.hierarchy-level::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, transparent 0%, var(--blue-primary) 50%, transparent 100%);
    transform: scaleY(0);
    transition: var(--transition);
}

.hierarchy-level:hover::before {
    transform: scaleY(1);
}

.hierarchy-level.hierarchy-hover {
    background: var(--blue-extra-light);
    transform: translateX(8px);
}

.hierarchy-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 0.875rem;
    margin-right: 1rem;
    flex-shrink: 0;
    box-shadow: var(--shadow-medium);
}

.hierarchy-content {
    flex: 1;
}

.hierarchy-title {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.25rem;
}

.hierarchy-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.125rem;
}

.hierarchy-code {
    font-size: 0.75rem;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    color: #64748b;
    background: #f1f5f9;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    display: inline-block;
}

/* Asset Image Styling */
.asset-image-container {
    cursor: pointer;
    overflow: hidden;
}

.asset-image {
    transition: var(--transition);
}

.asset-image:hover {
    transform: scale(1.05);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: var(--transition);
}

.asset-image-container:hover .image-overlay {
    opacity: 1;
}

.image-overlay-content {
    text-align: center;
}

/* Badge Enhancements */
.badge {
    padding: 0.5rem 0.75rem;
    border-radius: 8px;
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

/* Color variants */
.bg-blue-lt { background-color: var(--blue-light) !important; color: var(--blue-dark) !important; }
.bg-azure-lt { background-color: #e0f2fe !important; color: #0277bd !important; }
.bg-cyan-lt { background-color: #e0f7fa !important; color: #00695c !important; }
.bg-indigo-lt { background-color: #e8eaf6 !important; color: #3f51b5 !important; }
.bg-teal-lt { background-color: #e0f2f1 !important; color: #00695c !important; }
.bg-red-lt { background-color: #ffebee !important; color: #c62828 !important; }

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

.btn-blue {
    background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
    color: white;
}

.btn-yellow {
    background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
    color: white;
}

.btn-purple {
    background: linear-gradient(135deg, #9333ea 0%, #a855f7 100%);
    color: white;
}

/* List Group Styling */
.list-group-item {
    border: none;
    border-bottom: 1px solid #e2e8f0;
    transition: var(--transition);
}

.list-group-item:hover {
    background: var(--blue-extra-light);
    transform: translateX(4px);
}

.list-group-item:last-child {
    border-bottom: none;
}

/* Modal Enhancements */
.modal-content {
    border: none;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-large);
}

.modal-header {
    background: var(--blue-light);
    border-radius: var(--border-radius) var(--border-radius) 0 0;
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

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Level specific colors */
.level-1 .hierarchy-icon { background: linear-gradient(135deg, #2563eb, #3b82f6); }
.level-2 .hierarchy-icon { background: linear-gradient(135deg, #0891b2, #06b6d4); }
.level-3 .hierarchy-icon { background: linear-gradient(135deg, #0d9488, #14b8a6); }
.level-4 .hierarchy-icon { background: linear-gradient(135deg, #16a34a, #22c55e); }
.level-5 .hierarchy-icon { background: linear-gradient(135deg, #ea580c, #f97316); }
.level-6 .hierarchy-icon { background: linear-gradient(135deg, #dc2626, #ef4444); }
.level-7 .hierarchy-icon { background: linear-gradient(135deg, #9333ea, #a855f7); }

/* Responsive Design */
@media (max-width: 768px) {
    .detail-item {
        margin-bottom: 1rem;
    }
    
    .hierarchy-level {
        padding: 0.75rem 1rem;
    }
    
    .hierarchy-icon {
        width: 28px;
        height: 28px;
        font-size: 0.75rem;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
}

/* Print Styles */
@media print {
    .btn, .modal, .page-header .col-auto {
        display: none !important;
    }
    
    .card {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
        page-break-inside: avoid;
        margin-bottom: 1rem !important;
    }
    
    .card-header {
        background: #f8f9fa !important;
        color: #000 !important;
        -webkit-print-color-adjust: exact;
    }
    
    .hierarchy-level {
        page-break-inside: avoid;
    }
    
    .detail-item {
        background: #f8f9fa !important;
        -webkit-print-color-adjust: exact;
    }
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

/* Enhanced hover effects */
.card-hover {
    transition: var(--transition);
}

.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.25);
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

/* Enhanced badge colors */
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

/* Financial highlight */
.detail-value .fs-2,
.detail-value .fs-3,
.detail-value .fs-4 {
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Icon animations */
.icon {
    transition: var(--transition);
}

.btn:hover .icon {
    transform: scale(1.1);
}

/* Enhanced focus states */
.btn:focus,
.form-control:focus {
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    border-color: var(--blue-primary) !important;
}

/* Page header enhancements */
.page-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: var(--border-radius);
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-light);
}

/* Enhanced typography */
.page-title {
    font-weight: 700;
    color: #1e293b;
    text-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

/* Improved spacing */
.row.g-4 > * {
    margin-bottom: 1.5rem;
}

/* Enhanced modal backdrop */
.modal-backdrop {
    backdrop-filter: blur(4px);
}

/* Better image handling */
.asset-image {
    border-radius: 0 0 var(--border-radius) var(--border-radius);
    max-height: 300px;
    width: 100%;
    object-fit: cover;
}

/* Improved button groups */
.d-grid .btn + .btn {
    margin-top: 0.5rem;
}

/* Enhanced list styling */
.list-group-flush .list-group-item:first-child {
    border-top: none;
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

/* Improved text contrast */
.text-muted {
    color: #64748b !important;
}

/* Enhanced card spacing */
.card-body.p-4 {
    padding: 2rem !important;
}

/* Better hierarchy visual flow */
.hierarchy-tree::before {
    content: '';
    position: absolute;
    left: 47px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(180deg, transparent 0%, #e2e8f0 20%, #e2e8f0 80%, transparent 100%);
    z-index: 0;
}

.hierarchy-level {
    position: relative;
    z-index: 1;
}

/* Enhanced mobile responsiveness */
@media (max-width: 576px) {
    .page-header {
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .detail-item {
        padding: 0.75rem;
    }
    
    .hierarchy-level {
        padding: 0.5rem 1rem;
    }
    
    .btn-list .btn {
        margin-bottom: 0.5rem;
    }
    
    .modal-dialog {
        margin: 1rem;
    }
}

/* Dark mode compatibility (if needed) */
@media (prefers-color-scheme: dark) {
    :root {
        --bg-primary: #1e293b;
        --bg-secondary: #334155;
        --text-primary: #f1f5f9;
        --text-secondary: #cbd5e1;
    }
}

/* Accessibility improvements */
.btn:focus-visible {
    outline: 2px solid var(--blue-primary);
    outline-offset: 2px;
}

.hierarchy-level:focus-within {
    background: var(--blue-extra-light);
    outline: 2px solid var(--blue-primary);
    outline-offset: -2px;
}

/* Performance optimizations */
.card,
.btn,
.badge {
    will-change: transform;
}

/* Better text selection */
::selection {
    background: var(--blue-light);
    color: var(--blue-dark);
}

/* Enhanced visual hierarchy */
h1, h2, h3, h4, h5, h6 {
    color: #1e293b;
    font-weight: 600;
}

/* Improved form elements */
.form-control,
.form-select {
    border-radius: 8px;
    border: 1px solid #d1d5db;
    transition: var(--transition);
}

.form-control:focus,
.form-select:focus {
    border-color: var(--blue-primary);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Enhanced tooltip styling (if using tooltips) */
.tooltip {
    font-size: 0.75rem;
}

.tooltip-inner {
    background: #1e293b;
    border-radius: 6px;
    box-shadow: var(--shadow-medium);
}

/* Better table styling within cards */
.table-in-card {
    margin-bottom: 0;
}

.table-in-card th,
.table-in-card td {
    border-top: 1px solid #e2e8f0;
    padding: 0.75rem;
}

/* Enhanced progress bars (if needed) */
.progress {
    height: 8px;
    border-radius: 4px;
    background: #e2e8f0;
    overflow: hidden;
}

.progress-bar {
    background: linear-gradient(90deg, var(--blue-primary), var(--blue-secondary));
    transition: width 0.6s ease;
}
</style>
@endpush