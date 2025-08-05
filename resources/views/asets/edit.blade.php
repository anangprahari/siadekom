<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aset</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --success-color: #059669;
            --danger-color: #dc2626;
            --warning-color: #d97706;
            --info-color: #0891b2;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
        }

        body {
            background: linear-gradient(120deg, #e0e7ff 0%, #f1f5f9 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            padding: 1.5rem 0;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 1200px;
            margin: 0 auto;
        }

        .form-container h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .dropdown-section {
            background: var(--light-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 1.8rem;
            border: 1px solid #e2e8f0;
        }

        .dropdown-section h4 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.3rem;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.4rem;
        }

        /* Layout untuk dropdown hierarki */
        .dropdown-row-1 {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .dropdown-row-2 {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .dropdown-row-3 {
            display: flex;
            justify-content: center;
            margin-bottom: 0;
        }

        .dropdown-item {
            position: relative;
        }

        /* Untuk baris 1-2-3 (tiga kolom sama lebar) */
        .dropdown-row-1 .dropdown-item {
            flex: 1;
        }

        /* Untuk baris 4-5-6 (tiga kolom sama lebar) */
        .dropdown-row-2 .dropdown-item {
            flex: 1;
        }

        /* Untuk baris 7 (satu kolom di tengah, lebar 33%) */
        .dropdown-row-3 .dropdown-item {
            flex: 0 0 33.33%;
            max-width: 350px;
        }

        .dropdown-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.4rem;
            display: block;
            font-size: 0.9rem;
        }

        .required-field {
            color: var(--danger-color);
            font-weight: bold;
        }

        .form-select, .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 9px;
            padding: 0.65rem 0.9rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            width: 100%;
        }

        .form-select:focus, .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.18rem rgba(37, 99, 235, 0.25);
            outline: none;
        }

        .form-select:disabled {
            background-color: #f1f5f9;
            opacity: 0.7;
        }

        .loading {
            display: none;
            color: var(--primary-color);
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }

        .error-message {
            display: none;
            color: var(--danger-color);
            font-size: 0.82rem;
            margin-top: 0.22rem;
            font-weight: 500;
        }

        .hierarchy-display {
            background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%);
            border: 2px solid var(--info-color);
            border-radius: 14px;
            padding: 1.3rem;
            margin-bottom: 1.8rem;
        }

        .hierarchy-display h6 {
            color: var(--info-color);
            font-weight: 600;
            margin-bottom: 0.9rem;
        }

        .hierarchy-item {
            background: white;
            padding: 0.65rem 0.9rem;
            border-radius: 7px;
            margin-bottom: 0.45rem;
            border-left: 4px solid var(--info-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .hierarchy-level {
            font-weight: 600;
            color: var(--primary-color);
        }

        .kode-preview {
            background: linear-gradient(135deg, #dcfce7 0%, #f0fdf4 100%);
            border: 2px solid var(--success-color);
            border-radius: 14px;
            padding: 1.3rem;
            margin-bottom: 1.8rem;
            text-align: center;
            display: none;
        }

        .kode-preview i {
            color: var(--success-color);
            margin-right: 0.5rem;
            font-size: 1.15rem;
        }

        #kode-barang-text {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--success-color);
            font-family: 'Courier New', monospace;
        }

        .section-card {
            background: white;
            border-radius: 14px;
            padding: 1.8rem;
            margin-bottom: 1.8rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.3rem;
            padding-bottom: 0.4rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .btn {
            border-radius: 9px;
            padding: 0.65rem 1.3rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3b82f6 100%);
            border: none;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1.5px);
            box-shadow: 0 5px 18px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #6b7280 100%);
            border: none;
            box-shadow: 0 4px 14px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-1.5px);
            box-shadow: 0 5px 18px rgba(100, 116, 139, 0.4);
        }

        .alert {
            border-radius: 9px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .auto-filled {
            background-color: #f0f9ff !important;
            border-color: #0891b2 !important;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .dropdown-row-1,
            .dropdown-row-2 {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .dropdown-row-3 .dropdown-item {
                flex: 0 0 50%;
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 1rem;
                padding: 1.3rem;
            }
            
            .dropdown-section {
                padding: 1.2rem;
            }
            
            .dropdown-row-1,
            .dropdown-row-2,
            .dropdown-row-3 {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .dropdown-row-3 .dropdown-item {
                flex: 1;
                max-width: 100%;
            }
            
            .section-card {
                padding: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 1rem 0;
            }
            
            .form-container {
                margin: 0.5rem;
                padding: 1rem;
            }
            
            .dropdown-section {
                padding: 1rem;
            }
            
            .section-card {
                padding: 1rem;
            }
        }

        .fade-in {
            animation: fadeIn 0.4s ease-in;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(15px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        /* Utility classes */
        .text-center {
            text-align: center;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .text-muted {
            color: #6c757d;
        }

        .text-primary {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container-fluid main-container">
        <div class="form-container">
            <div class="text-center mb-4">
                <h2>
                    <i class="fas fa-edit text-primary"></i> Edit Aset
                </h2>
                <p class="text-muted">Perbarui informasi aset di bawah ini</p>
            </div>

            <form id="assetForm" method="POST" action="{{ route('asets.update', $aset->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Dropdown Hierarki Section -->
                <div class="dropdown-section">
                    <h4 class="mb-3">
                        <i class="fas fa-sitemap"></i> Pilih Hierarki Aset
                    </h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="dropdown-item">
                                <label class="dropdown-label">1. Akun <span class="required-field">*</span></label>
                                <select class="form-select" id="akun" name="akun_id" required>
                                    <option value="">Pilih Akun</option>
                                    @foreach ($akuns as $akun)
                                        <option value="{{ $akun->id }}" data-kode="{{ $akun->kode }}"
                                            {{ old('akun_id', $selectedValues['akun_id'] ?? '') == $akun->id ? 'selected' : '' }}>
                                            {{ $akun->kode }} - {{ $akun->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-akun"></i>
                                <div class="error-message" id="error-akun"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="dropdown-item">
                                <label class="dropdown-label">2. Kelompok <span class="required-field">*</span></label>
                                <select class="form-select" id="kelompok" name="kelompok_id" required>
                                    <option value="">Pilih Kelompok</option>
                                    @foreach ($kelompoks as $kelompok)
                                        <option value="{{ $kelompok->id }}" data-kode="{{ $kelompok->kode }}"
                                            {{ old('kelompok_id', $selectedValues['kelompok_id'] ?? '') == $kelompok->id ? 'selected' : '' }}>
                                            {{ $kelompok->kode }} - {{ $kelompok->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-kelompok"></i>
                                <div class="error-message" id="error-kelompok"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="dropdown-item">
                                <label class="dropdown-label">3. Jenis <span class="required-field">*</span></label>
                                <select class="form-select" id="jenis" name="jenis_id" required>
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->id }}" data-kode="{{ $j->kode }}"
                                            {{ old('jenis_id', $selectedValues['jenis_id'] ?? '') == $j->id ? 'selected' : '' }}>
                                            {{ $j->kode }} - {{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-jenis"></i>
                                <div class="error-message" id="error-jenis"></div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="dropdown-item">
                                <label class="dropdown-label">4. Objek <span class="required-field">*</span></label>
                                <select class="form-select" id="objek" name="objek_id" required>
                                    <option value="">Pilih Objek</option>
                                    @foreach ($objeks as $objek)
                                        <option value="{{ $objek->id }}" data-kode="{{ $objek->kode }}"
                                            {{ old('objek_id', $selectedValues['objek_id'] ?? '') == $objek->id ? 'selected' : '' }}>
                                            {{ $objek->kode }} - {{ $objek->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-objek"></i>
                                <div class="error-message" id="error-objek"></div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="dropdown-item">
                                <label class="dropdown-label">5. Rincian Objek <span class="required-field">*</span></label>
                                <select class="form-select" id="rincian_objek" name="rincian_objek_id" required>
                                    <option value="">Pilih Rincian Objek</option>
                                    @foreach ($rincianObjeks as $rincianObjek)
                                        <option value="{{ $rincianObjek->id }}" data-kode="{{ $rincianObjek->kode }}"
                                            {{ old('rincian_objek_id', $selectedValues['rincian_objek_id'] ?? '') == $rincianObjek->id ? 'selected' : '' }}>
                                            {{ $rincianObjek->kode }} - {{ $rincianObjek->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-rincian-objek"></i>
                                <div class="error-message" id="error-rincian-objek"></div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="dropdown-item">
                                <label class="dropdown-label">6. Sub Rincian Objek <span class="required-field">*</span></label>
                                <select class="form-select" id="sub_rincian_objek" name="sub_rincian_objek_id" required>
                                    <option value="">Pilih Sub Rincian Objek</option>
                                    @foreach ($subRincianObjeks as $subRincianObjek)
                                        <option value="{{ $subRincianObjek->id }}" data-kode="{{ $subRincianObjek->kode }}"
                                            {{ old('sub_rincian_objek_id', $selectedValues['sub_rincian_objek_id'] ?? '') == $subRincianObjek->id ? 'selected' : '' }}>
                                            {{ $subRincianObjek->kode }} - {{ $subRincianObjek->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-sub-rincian-objek"></i>
                                <div class="error-message" id="error-sub-rincian-objek"></div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="dropdown-item">
                                <label class="dropdown-label">7. Sub Sub Rincian Objek <span class="required-field">*</span></label>
                                <select class="form-select" id="sub_sub_rincian_objek" name="sub_sub_rincian_objek_id" required>
                                    <option value="">Pilih Sub Sub Rincian Objek</option>
                                    @foreach ($subSubRincianObjeks as $subSubRincianObjek)
                                        <option value="{{ $subSubRincianObjek->id }}" data-kode="{{ $subSubRincianObjek->kode }}"
                                            {{ old('sub_sub_rincian_objek_id', $selectedValues['sub_sub_rincian_objek_id'] ?? '') == $subSubRincianObjek->id ? 'selected' : '' }}>
                                            {{ $subSubRincianObjek->kode }} - {{ $subSubRincianObjek->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-spinner fa-spin loading" id="loading-sub-sub-rincian-objek"></i>
                                <div class="error-message" id="error-sub-sub-rincian-objek"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Display Hierarki yang dipilih -->
                <div class="hierarchy-display fade-in" id="hierarchy-display" style="display: {{ !empty($selectedHierarchy) ? 'block' : 'none' }};">
                    <h6><i class="fas fa-list"></i> Hierarki Yang Dipilih:</h6>
                    <div id="hierarchy-content">
                        @if(!empty($selectedHierarchy))
                            @foreach ($selectedHierarchy as $key => $item)
                                @if($item)
                                    <div class="hierarchy-item"><span class="hierarchy-level">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span> {{ $item->nama ?? $item->nama_barang }}</div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Kode Barang Preview -->
                <div class="kode-preview fade-in" id="kode-preview" style="display: {{ old('kode_barang', $aset->kode_barang) ? 'block' : 'none' }};">
                    <i class="fas fa-barcode"></i> Kode Barang: <span id="kode-barang-text">{{ old('kode_barang', $aset->kode_barang) }}</span>
                    <input type="hidden" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $aset->kode_barang) }}">
                </div>

                <!-- Informasi Dasar Aset -->
                <div class="section-card">
                    <h4 class="section-title">
                        <i class="fas fa-info-circle"></i> Informasi Dasar Aset
                    </h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Bidang Barang <span class="required-field">*</span></label>
                                <input type="text" class="form-control" name="nama_bidang_barang" value="{{ old('nama_bidang_barang', $aset->nama_bidang_barang) }}" required 
                                       placeholder="Masukkan nama bidang barang">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Register <span class="required-field">*</span></label>
                                <input type="text" class="form-control" name="register" value="{{ old('register', $aset->register) }}" required 
                                       placeholder="Masukkan nomor register">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Jenis Barang <span class="required-field">*</span></label>
                                <input type="text" class="form-control" name="nama_jenis_barang" value="{{ old('nama_jenis_barang', $aset->nama_jenis_barang) }}" required 
                                       placeholder="Masukkan nama jenis barang">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Asal Perolehan <span class="required-field">*</span></label>
                                <input type="text" class="form-control" name="asal_perolehan" value="{{ old('asal_perolehan', $aset->asal_perolehan) }}" required 
                                       placeholder="Masukkan asal perolehan">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Tahun Perolehan <span class="required-field">*</span></label>
                                <input type="number" class="form-control" name="tahun_perolehan" min="1900" max="{{ date('Y') }}" value="{{ old('tahun_perolehan', $aset->tahun_perolehan) }}" required 
                                    placeholder="Masukkan tahun perolehan">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Satuan <span class="required-field">*</span></label>
                                <input type="text" class="form-control" name="satuan" value="{{ old('satuan', $aset->satuan) }}" required 
                                       placeholder="Contoh: Unit, Buah, Set">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Keadaan Barang <span class="required-field">*</span></label>
                                <select class="form-select" name="keadaan_barang" required>
                                    <option value="">Pilih Keadaan Barang</option>
                                    <option value="Baik" {{ old('keadaan_barang', $aset->keadaan_barang) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Kurang Baik" {{ old('keadaan_barang', $aset->keadaan_barang) == 'Kurang Baik' ? 'selected' : '' }}>Kurang Baik</option>
                                    <option value="Rusak Berat" {{ old('keadaan_barang', $aset->keadaan_barang) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jumlah Barang <span class="required-field">*</span></label>
                                <input type="number" class="form-control" name="jumlah_barang" min="1" value="{{ old('jumlah_barang', $aset->jumlah_barang) }}" required 
                                       placeholder="Masukkan jumlah barang">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Harga Satuan <span class="required-field">*</span></label>
                                <input type="number" class="form-control" name="harga_satuan" min="0" step="0.01" value="{{ old('harga_satuan', $aset->harga_satuan) }}" required 
                                       placeholder="Masukkan harga satuan">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Tambahan -->
                <div class="section-card">
                    <h4 class="section-title">
                        <i class="fas fa-plus-circle"></i> Informasi Tambahan
                    </h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Merk / Type</label>
                                <input type="text" class="form-control" name="merk_type" value="{{ old('merk_type', $aset->merk_type) }}" 
                                       placeholder="Masukkan merk atau type barang">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Sertifikat</label>
                                <input type="text" class="form-control" name="no_sertifikat" value="{{ old('no_sertifikat', $aset->no_sertifikat) }}" 
                                       placeholder="Masukkan nomor sertifikat">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Plat Kendaraan</label>
                                <input type="text" class="form-control" name="no_plat_kendaraan" value="{{ old('no_plat_kendaraan', $aset->no_plat_kendaraan) }}" 
                                       placeholder="Masukkan nomor plat kendaraan">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Pabrik</label>
                                <input type="text" class="form-control" name="no_pabrik" value="{{ old('no_pabrik', $aset->no_pabrik) }}" 
                                       placeholder="Masukkan nomor pabrik">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">No. Casis</label>
                                <input type="text" class="form-control" name="no_casis" value="{{ old('no_casis', $aset->no_casis) }}" 
                                       placeholder="Masukkan nomor casis">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bahan</label>
                                <input type="text" class="form-control" name="bahan" value="{{ old('bahan', $aset->bahan) }}" 
                                       placeholder="Masukkan bahan barang">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Ukuran Barang / Konstruksi</label>
                                <input type="text" class="form-control" name="ukuran_barang_konstruksi" value="{{ old('ukuran_barang_konstruksi', $aset->ukuran_barang_konstruksi) }}" 
                                       placeholder="Masukkan ukuran barang atau konstruksi">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bukti Barang</label>
                                <input type="file" class="form-control" name="bukti_barang" 
                                       accept="image/jpeg,image/png,image/jpg,image/gif">
                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                @if($aset->bukti_barang_path)
                                    <div class="mt-2">
                                        <small class="text-muted">File saat ini: <a href="{{ Storage::url($aset->bukti_barang_path) }}" target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Bukti Berita</label>
                                <input type="file" class="form-control" name="bukti_berita" 
                                       accept="application/pdf">
                                <small class="text-muted">Format: PDF. Maksimal 10MB</small>
                                @if($aset->bukti_berita_path)
                                    <div class="mt-2">
                                        <small class="text-muted">File saat ini: <a href="{{ Storage::url($aset->bukti_berita_path) }}" target="_blank">Lihat File</a></small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-secondary me-3" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Aset
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>

    <script>
        // Variabel global untuk menyimpan hierarki yang dipilih
        let selectedHierarchy = {
            akun: @json($selectedHierarchy['akun'] ?? null),
            kelompok: @json($selectedHierarchy['kelompok'] ?? null),
            jenis: @json($selectedHierarchy['jenis'] ?? null),
            objek: @json($selectedHierarchy['objek'] ?? null),
            rincianObjek: @json($selectedHierarchy['rincian_objek'] ?? null),
            subRincianObjek: @json($selectedHierarchy['sub_rincian_objek'] ?? null),
            subSubRincianObjek: @json($selectedHierarchy['sub_sub_rincian_objek'] ?? null)
        };

        // Data untuk pre-populate (dari controller)
        const selectedValues = @json($selectedValues ?? []);
        const isEditMode = true;
        let isInitializing = true;

        document.addEventListener('DOMContentLoaded', function () {
            // Setup event listeners
            setupEventListeners();
            
            // Pre-load existing hierarchy pada saat edit
            setTimeout(() => {
                preLoadExistingHierarchy();
            }, 100);

            // Show validation errors if any
            @if($errors->any())
                let errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '{{ $error }}\n';
                @endforeach
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: errorMessages,
                });
            @endif
        });

        function preLoadExistingHierarchy() {
            isInitializing = true;
            
            // Set akun yang sudah terpilih dari awal
            if (selectedValues.akun_id) {
                document.getElementById('akun').value = selectedValues.akun_id;
                selectedHierarchy.akun = getSelectedOption(document.getElementById('akun'));
                
                // Load kelompok
                loadKelompoks(selectedValues.akun_id, () => {
                    if (selectedValues.kelompok_id) {
                        document.getElementById('kelompok').value = selectedValues.kelompok_id;
                        selectedHierarchy.kelompok = getSelectedOption(document.getElementById('kelompok'));
                        
                        loadJenis(selectedValues.kelompok_id, () => {
                            if (selectedValues.jenis_id) {
                                document.getElementById('jenis').value = selectedValues.jenis_id;
                                selectedHierarchy.jenis = getSelectedOption(document.getElementById('jenis'));
                                
                                loadObjeks(selectedValues.jenis_id, () => {
                                    if (selectedValues.objek_id) {
                                        document.getElementById('objek').value = selectedValues.objek_id;
                                        selectedHierarchy.objek = getSelectedOption(document.getElementById('objek'));
                                        
                                        loadRincianObjeks(selectedValues.objek_id, () => {
                                            if (selectedValues.rincian_objek_id) {
                                                document.getElementById('rincian_objek').value = selectedValues.rincian_objek_id;
                                                selectedHierarchy.rincianObjek = getSelectedOption(document.getElementById('rincian_objek'));
                                                
                                                loadSubRincianObjeks(selectedValues.rincian_objek_id, () => {
                                                    if (selectedValues.sub_rincian_objek_id) {
                                                        document.getElementById('sub_rincian_objek').value = selectedValues.sub_rincian_objek_id;
                                                        selectedHierarchy.subRincianObjek = getSelectedOption(document.getElementById('sub_rincian_objek'));
                                                        
                                                        loadSubSubRincianObjeks(selectedValues.sub_rincian_objek_id, () => {
                                                            if (selectedValues.sub_sub_rincian_objek_id) {
                                                                document.getElementById('sub_sub_rincian_objek').value = selectedValues.sub_sub_rincian_objek_id;
                                                                selectedHierarchy.subSubRincianObjek = getSelectedOption(document.getElementById('sub_sub_rincian_objek'));
                                                            }
                                                            finishInitialization();
                                                        });
                                                    } else {
                                                        finishInitialization();
                                                    }
                                                });
                                            } else {
                                                finishInitialization();
                                            }
                                        });
                                    } else {
                                        finishInitialization();
                                    }
                                });
                            } else {
                                finishInitialization();
                            }
                        });
                    } else {
                        finishInitialization();
                    }
                });
            } else {
                finishInitialization();
            }
        }

        // Tambahkan function baru untuk menyelesaikan inisialisasi
        function finishInitialization() {
            // PENTING: Reset flag isInitializing agar event listener bisa berfungsi
            isInitializing = false;
            
            // Update display dan kode barang
            updateHierarchyDisplay();
            updateKodeBarang();
            
            console.log('Initialization completed. Event listeners are now active.');
        }

        function setupEventListeners() {
            // Event listeners untuk setiap dropdown
            document.getElementById('akun')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const akunId = this.value;
                selectedHierarchy.akun = getSelectedOption(this);
                
                if (akunId) {
                    loadKelompoks(akunId, () => {
                        resetDropdowns(['kelompok', 'jenis', 'objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetAllDropdowns();
                }
            });
            
            document.getElementById('kelompok')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const kelompokId = this.value;
                selectedHierarchy.kelompok = getSelectedOption(this);
                
                if (kelompokId) {
                    loadJenis(kelompokId, () => {
                        resetDropdowns(['jenis', 'objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetDropdowns(['jenis', 'objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                    updateHierarchyDisplay();
                    updateKodeBarang();
                }
            });
            
            document.getElementById('jenis')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const jenisId = this.value;
                selectedHierarchy.jenis = getSelectedOption(this);
                
                if (jenisId) {
                    loadObjeks(jenisId, () => {
                        resetDropdowns(['objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetDropdowns(['objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                    updateHierarchyDisplay();
                    updateKodeBarang();
                }
            });
            
            document.getElementById('objek')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const objekId = this.value;
                selectedHierarchy.objek = getSelectedOption(this);
                
                if (objekId) {
                    loadRincianObjeks(objekId, () => {
                        resetDropdowns(['rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetDropdowns(['rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
                    updateHierarchyDisplay();
                    updateKodeBarang();
                }
            });
            
            document.getElementById('rincian_objek')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const rincianObjekId = this.value;
                selectedHierarchy.rincianObjek = getSelectedOption(this);
                
                if (rincianObjekId) {
                    loadSubRincianObjeks(rincianObjekId, () => {
                        resetDropdowns(['sub_rincian_objek', 'sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetDropdowns(['sub_rincian_objek', 'sub_sub_rincian_objek']);
                    updateHierarchyDisplay();
                    updateKodeBarang();
                }
            });
            
            document.getElementById('sub_rincian_objek')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                const subRincianObjekId = this.value;
                selectedHierarchy.subRincianObjek = getSelectedOption(this);
                
                // Auto-fill Nama Bidang Barang
                if (selectedHierarchy.subRincianObjek && selectedHierarchy.subRincianObjek.nama) {
                    const namaBidangBarangInput = document.querySelector('input[name="nama_bidang_barang"]');
                    if (namaBidangBarangInput) {
                        namaBidangBarangInput.value = selectedHierarchy.subRincianObjek.nama;
                    }
                } else {
                    // Clear field jika tidak ada pilihan
                    const namaBidangBarangInput = document.querySelector('input[name="nama_bidang_barang"]');
                    if (namaBidangBarangInput) {
                        namaBidangBarangInput.value = '';
                    }
                }
                
                if (subRincianObjekId) {
                    loadSubSubRincianObjeks(subRincianObjekId, () => {
                        resetDropdowns(['sub_sub_rincian_objek']);
                        updateHierarchyDisplay();
                        updateKodeBarang();
                    });
                } else {
                    resetDropdowns(['sub_sub_rincian_objek']);
                    updateHierarchyDisplay();
                    updateKodeBarang();
                }
            });
            
            document.getElementById('sub_sub_rincian_objek')?.addEventListener('change', function() {
                if (isInitializing) return;
                
                selectedHierarchy.subSubRincianObjek = getSelectedOption(this);
                updateHierarchyDisplay();
                updateKodeBarang();
            });
            
            // Form submission handler
            document.getElementById('assetForm')?.addEventListener('submit', function(e) {
                const isValid = validateDropdowns();
                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap lengkapi semua level hierarki aset yang wajib diisi!',
                    });
                    return;
                }
                
                // Show loading
                Swal.fire({
                    title: 'Memperbarui...',
                    text: 'Sedang memproses data aset',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            });
        }
        
        function getSelectedOption(selectElement) {
            if (!selectElement) return null;
            
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            if (selectedOption && selectedOption.value) {
                // Ambil kode dari data-kode attribute yang sudah diset saat populate
                const kode = selectedOption.dataset.kode || '';
                
                // Ambil nama dari text content (hilangkan bagian kode di depan)
                let nama = selectedOption.textContent;
                if (nama.includes(' - ')) {
                    nama = nama.split(' - ').slice(1).join(' - '); // Ambil setelah " - "
                }
                
                return {
                    id: selectedOption.value,
                    nama: nama,
                    kode: kode
                };
            }
            return null;
        }
        
        function loadKelompoks(akunId, callback = null) {
            const select = document.getElementById('kelompok');
            if (!select) return;
            
            showLoading('kelompok');
            
            fetch(`/api/asets/kelompoks/${akunId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Kelompok');
                        select.disabled = data.data.length === 0;
                        hideError('kelompok');
                        if (callback) callback();
                    } else {
                        showError('kelompok', data.message || 'Gagal memuat data kelompok');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading kelompoks:', error);
                    showError('kelompok', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('kelompok');
                });
        }
        
        function loadJenis(kelompokId, callback = null) {
            const select = document.getElementById('jenis');
            if (!select) return;
            
            showLoading('jenis');
            
            fetch(`/api/asets/jenis/${kelompokId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Jenis');
                        select.disabled = data.data.length === 0;
                        hideError('jenis');
                        if (callback) callback();
                    } else {
                        showError('jenis', data.message || 'Gagal memuat data jenis');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading jenis:', error);
                    showError('jenis', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('jenis');
                });
        }
        
        function loadObjeks(jenisId, callback = null) {
            const select = document.getElementById('objek');
            if (!select) return;
            
            showLoading('objek');
            
            fetch(`/api/asets/objeks/${jenisId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Objek');
                        select.disabled = data.data.length === 0;
                        hideError('objek');
                        if (callback) callback();
                    } else {
                        showError('objek', data.message || 'Gagal memuat data objek');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading objeks:', error);
                    showError('objek', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('objek');
                });
        }
        
        function loadRincianObjeks(objekId, callback = null) {
            const select = document.getElementById('rincian_objek');
            if (!select) return;
            
            showLoading('rincian-objek');
            
            fetch(`/api/asets/rincian-objeks/${objekId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Rincian Objek');
                        select.disabled = data.data.length === 0;
                        hideError('rincian-objek');
                        if (callback) callback();
                    } else {
                        showError('rincian-objek', data.message || 'Gagal memuat data rincian objek');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading rincian objeks:', error);
                    showError('rincian-objek', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('rincian-objek');
                });
        }
        
        function loadSubRincianObjeks(rincianObjekId, callback = null) {
            const select = document.getElementById('sub_rincian_objek');
            if (!select) return;
            
            showLoading('sub-rincian-objek');
            
            fetch(`/api/asets/sub-rincian-objeks/${rincianObjekId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Sub Rincian Objek');
                        select.disabled = data.data.length === 0;
                        hideError('sub-rincian-objek');
                        if (callback) callback();
                    } else {
                        showError('sub-rincian-objek', data.message || 'Gagal memuat data sub rincian objek');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading sub rincian objeks:', error);
                    showError('sub-rincian-objek', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('sub-rincian-objek');
                });
        }
        
        function loadSubSubRincianObjeks(subRincianObjekId, callback = null) {
            const select = document.getElementById('sub_sub_rincian_objek');
            if (!select) return;
            
            showLoading('sub-sub-rincian-objek');
            
            fetch(`/api/asets/sub-sub-rincian-objeks/${subRincianObjekId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateSelect(select, data.data, 'Pilih Sub Sub Rincian Objek', 'nama_barang');
                        select.disabled = data.data.length === 0;
                        hideError('sub-sub-rincian-objek');
                        if (callback) callback();
                    } else {
                        showError('sub-sub-rincian-objek', data.message || 'Gagal memuat data sub sub rincian objek');
                        select.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error loading sub sub rincian objeks:', error);
                    showError('sub-sub-rincian-objek', 'Terjadi kesalahan saat memuat data');
                    select.disabled = true;
                })
                .finally(() => {
                    hideLoading('sub-sub-rincian-objek');
                });
        }
        
        function populateSelect(select, data, placeholder, nameField = 'nama') {
            if (!select) return;
            
            select.innerHTML = `<option value="">${placeholder}</option>`;
            
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = `${item.kode} - ${item[nameField]}`;
                
                // PENTING: Set data-kode dengan kode murni dari database
                option.dataset.kode = item.kode;
                
                select.appendChild(option);
            });
        }
        
        function resetDropdowns(dropdownIds) {
            dropdownIds.forEach(id => {
                const select = document.getElementById(id);
                if (select) {
                    select.innerHTML = '<option value="">Pilih...</option>';
                    select.disabled = true;
                    const errorId = id.replace(/_/g, '-');
                    hideError(errorId);
                    
                    // Clear from selectedHierarchy
                    const key = getHierarchyKey(id);
                    if (key && selectedHierarchy[key]) {
                        delete selectedHierarchy[key];
                    }
                    
                    // Clear Nama Bidang Barang jika sub_rincian_objek di-reset
                    if (id === 'sub_rincian_objek') {
                        const namaBidangBarangInput = document.querySelector('input[name="nama_bidang_barang"]');
                        if (namaBidangBarangInput) {
                            namaBidangBarangInput.value = '';
                        }
                    }
                }
            });
        }

        function getHierarchyKey(dropdownId) {
            const mapping = {
                'akun': 'akun',
                'kelompok': 'kelompok',
                'jenis': 'jenis', 
                'objek': 'objek',
                'rincian_objek': 'rincianObjek',
                'sub_rincian_objek': 'subRincianObjek',
                'sub_sub_rincian_objek': 'subSubRincianObjek'
            };
            return mapping[dropdownId];
        }
            
        function resetAllDropdowns() {
            resetDropdowns(['kelompok', 'jenis', 'objek', 'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek']);
            hideKodePreview();
            
            // Reset selectedHierarchy tapi pertahankan akun
            const currentAkun = selectedHierarchy.akun;
            selectedHierarchy = {};
            if (currentAkun) {
                selectedHierarchy.akun = currentAkun;
            }
            
            updateHierarchyDisplay();
        }
        
        function showLoading(type) {
            const loadingElement = document.getElementById(`loading-${type}`);
            if (loadingElement) loadingElement.style.display = 'inline-block';
        }
        
        function hideLoading(type) {
            const loadingElement = document.getElementById(`loading-${type}`);
            if (loadingElement) loadingElement.style.display = 'none';
        }
        
        function showError(field, message) {
            const errorElement = document.getElementById(`error-${field}`);
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
        }
        
        function hideError(field) {
            const errorElement = document.getElementById(`error-${field}`);
            if (errorElement) errorElement.style.display = 'none';
        }
        
        function validateDropdowns() {
            let isValid = true;
            const dropdowns = [
                'akun', 'kelompok', 'jenis', 'objek', 
                'rincian_objek', 'sub_rincian_objek', 'sub_sub_rincian_objek'
            ];
            
            dropdowns.forEach(dropdownId => {
                const select = document.getElementById(dropdownId);
                if (select && !select.value) {
                    const fieldName = dropdownId.replace(/_/g, '-');
                    showError(fieldName, 'Field ini wajib diisi');
                    isValid = false;
                }
            });
            
            return isValid;
        }
        
        // Generate kode barang otomatis
        function updateKodeBarang() {
            // Generate kode barang automatically when all hierarchy is selected
            if (selectedHierarchy.akun && selectedHierarchy.kelompok && selectedHierarchy.jenis && 
                selectedHierarchy.objek && selectedHierarchy.rincianObjek && 
                selectedHierarchy.subRincianObjek && selectedHierarchy.subSubRincianObjek) {
                
                // Generate kode barang from hierarchy
                const kodeBarang = generateKodeFromHierarchy();
                
                if (kodeBarang) {
                    document.getElementById('kode-barang-text').textContent = kodeBarang;
                    document.getElementById('kode_barang').value = kodeBarang;
                    document.getElementById('kode-preview').style.display = 'block';
                }
            } else {
                const existingKode = "{{ old('kode_barang', $aset->kode_barang) }}";
                if(existingKode) {
                    document.getElementById('kode-barang-text').textContent = existingKode;
                    document.getElementById('kode_barang').value = existingKode;
                    document.getElementById('kode-preview').style.display = 'block';
                } else {
                    hideKodePreview();
                }
            }
        }
        
        // Generate kode dari hierarki yang dipilih
        function generateKodeFromHierarchy() {
            try {
                // Pastikan semua level hierarki sudah dipilih
                if (!selectedHierarchy.subSubRincianObjek?.kode) {
                    return null;
                }
                
                // Ambil kode dari level terakhir (sub_sub_rincian_objek) 
                // karena sudah merupakan kode lengkap dari database
                let kode = selectedHierarchy.subSubRincianObjek.kode;
                
                // Return kode tanpa menambah timestamp jika tidak diperlukan
                return kode; // Contoh: 1.1.1.01.01.01.001
                
            } catch (error) {
                console.error('Error generating kode barang:', error);
                return null;
            }
        }
        
        function hideKodePreview() {
            const preview = document.getElementById('kode-preview');
            const kodeInput = document.getElementById('kode_barang');
            if (preview) preview.style.display = 'none';
            if (kodeInput) kodeInput.value = '';
        }
        
        function updateHierarchyDisplay() {
            const hierarchyDisplay = document.getElementById('hierarchy-display');
            const hierarchyContent = document.getElementById('hierarchy-content');
            
            if (!hierarchyDisplay || !hierarchyContent) return;
            
            let content = '';
            
            if (selectedHierarchy.akun) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Akun:</span> ${selectedHierarchy.akun.nama}</div>`;
            }
            if (selectedHierarchy.kelompok) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Kelompok:</span> ${selectedHierarchy.kelompok.nama}</div>`;
            }
            if (selectedHierarchy.jenis) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Jenis:</span> ${selectedHierarchy.jenis.nama}</div>`;
            }
            if (selectedHierarchy.objek) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Objek:</span> ${selectedHierarchy.objek.nama}</div>`;
            }
            if (selectedHierarchy.rincianObjek) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Rincian Objek:</span> ${selectedHierarchy.rincianObjek.nama}</div>`;
            }
            if (selectedHierarchy.subRincianObjek) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Sub Rincian Objek:</span> ${selectedHierarchy.subRincianObjek.nama}</div>`;
            }
            if (selectedHierarchy.subSubRincianObjek) {
                content += `<div class="hierarchy-item"><span class="hierarchy-level">Sub Sub Rincian:</span> ${selectedHierarchy.subSubRincianObjek.nama}</div>`;
            }
            
            if (content) {
                hierarchyContent.innerHTML = content;
                hierarchyDisplay.style.display = 'block';
            } else {
                hierarchyDisplay.style.display = 'none';
            }
        }

        function goBack() {
            window.history.back();
        }
document.addEventListener('DOMContentLoaded', function() {
    const keadaanBarangSelect = document.querySelector('select[name="keadaan_barang"]');
    
    if (keadaanBarangSelect) {
        keadaanBarangSelect.addEventListener('change', function() {
            handleKeadaanBarangChange(this.value);
        });
        
        // Trigger untuk nilai yang sudah ada saat halaman dimuat
        if (keadaanBarangSelect.value) {
            handleKeadaanBarangChange(keadaanBarangSelect.value);
        }
    }
});

// Function baru untuk handle perubahan keadaan barang
function handleKeadaanBarangChange(keadaanBarang) {
    const kodeBarangDisplay = document.getElementById('kode-barang-text');
    const kodeBarangInput = document.getElementById('kode_barang');
    const kodePreview = document.getElementById('kode-preview');
    
    if (keadaanBarang === 'Rusak Berat') {
        // Jika rusak berat, gunakan kode khusus
        const kodeRusakBerat = '1.5.4.01.01.01.005';
        
        if (kodeBarangDisplay) {
            kodeBarangDisplay.textContent = kodeRusakBerat;
            kodeBarangDisplay.style.color = '#dc2626'; // Red color untuk rusak berat
        }
        
        if (kodeBarangInput) {
            kodeBarangInput.value = kodeRusakBerat;
        }
        
        if (kodePreview) {
            kodePreview.style.display = 'block';
            kodePreview.style.borderColor = '#dc2626';
            kodePreview.style.background = 'linear-gradient(135deg, #fee2e2 0%, #fef2f2 100%)';
            
            // Update icon dan text
            const icon = kodePreview.querySelector('i');
            if (icon) {
                icon.style.color = '#dc2626';
            }
        }
        
        // Show warning message
        showRusakBeratWarning();
        
        // Update register juga
        updateRegisterForRusakBerat();
        
    } else if (keadaanBarang === 'Baik' || keadaanBarang === 'Kurang Baik') {
        // Jika bukan rusak berat, gunakan kode normal dari hierarki
        updateKodeBarang();
        
        // Reset styling
        if (kodeBarangDisplay) {
            kodeBarangDisplay.style.color = '#059669'; // Green color normal
        }
        
        if (kodePreview) {
            kodePreview.style.borderColor = '#059669';
            kodePreview.style.background = 'linear-gradient(135deg, #dcfce7 0%, #f0fdf4 100%)';
            
            const icon = kodePreview.querySelector('i');
            if (icon) {
                icon.style.color = '#059669';
            }
        }
        
        // Hide warning
        hideRusakBeratWarning();
    }
}

// Function untuk show warning rusak berat
function showRusakBeratWarning() {
    // Remove existing warning first
    hideRusakBeratWarning();
    
    const kodePreview = document.getElementById('kode-preview');
    if (kodePreview) {
        const warningDiv = document.createElement('div');
        warningDiv.id = 'rusak-berat-warning';
        warningDiv.className = 'alert alert-warning mt-3';
        warningDiv.innerHTML = `
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Perhatian:</strong> Aset dengan keadaan "Rusak Berat" akan menggunakan kode barang khusus 
            dan akan diurutkan di bagian paling bawah daftar aset.
        `;
        
        kodePreview.parentNode.insertBefore(warningDiv, kodePreview.nextSibling);
    }
}

// Function untuk hide warning rusak berat
function hideRusakBeratWarning() {
    const existingWarning = document.getElementById('rusak-berat-warning');
    if (existingWarning) {
        existingWarning.remove();
    }
}

// Function untuk update register khusus rusak berat
function updateRegisterForRusakBerat() {
    const kodeBarang = '1.5.4.01.01.01.005';
    const registerInput = document.querySelector('input[name="register"]');
    
    if (!registerInput) return;
    
    // Untuk edit mode, tampilkan pesan bahwa register tidak berubah
    // karena sudah ada register yang sudah diset sebelumnya
    
    // Optional: Bisa ditambahkan AJAX call jika ingin update register untuk rusak berat
    // fetch('/asets/get-register-info', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    //     },
    //     body: JSON.stringify({
    //         kode_barang: kodeBarang
    //     })
    // })
    // .then(response => response.json())
    // .then(data => {
    //     if (data.success) {
    //         const nextRegisterFormatted = data.data.next_register_formatted;
    //         registerInput.value = nextRegisterFormatted;
    //     }
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    // });
}

// Update function updateKodeBarang() yang sudah ada - tambahkan pengecekan keadaan barang
// Ganti function updateKodeBarang() yang sudah ada dengan yang ini:
function updateKodeBarang() {
    const keadaanBarangSelect = document.querySelector('select[name="keadaan_barang"]');
    
    // Jika keadaan barang adalah rusak berat, gunakan kode khusus
    if (keadaanBarangSelect && keadaanBarangSelect.value === 'Rusak Berat') {
        handleKeadaanBarangChange('Rusak Berat');
        return;
    }
    
    // Generate kode barang automatically when all hierarchy is selected
    if (selectedHierarchy.akun && selectedHierarchy.kelompok && selectedHierarchy.jenis && 
        selectedHierarchy.objek && selectedHierarchy.rincianObjek && 
        selectedHierarchy.subRincianObjek && selectedHierarchy.subSubRincianObjek) {
        
        // Generate kode barang from hierarchy
        const kodeBarang = generateKodeFromHierarchy();
        
        if (kodeBarang) {
            document.getElementById('kode-barang-text').textContent = kodeBarang;
            document.getElementById('kode_barang').value = kodeBarang;
            document.getElementById('kode-preview').style.display = 'block';
        }
    } else {
        const existingKode = "{{ old('kode_barang', $aset->kode_barang) }}";
        if(existingKode) {
            document.getElementById('kode-barang-text').textContent = existingKode;
            document.getElementById('kode_barang').value = existingKode;
            document.getElementById('kode-preview').style.display = 'block';
        } else {
            hideKodePreview();
        }
    }
}
        
    </script>
</body>
</html>