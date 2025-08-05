<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aset Lancar</title>
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

        .dropdown-section, .section-card {
            background: var(--light-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 1.8rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.3rem;
            padding-bottom: 0.4rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 0.9rem;
        }

        .required-field {
            color: var(--danger-color);
            font-weight: bold;
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 9px;
            padding: 0.65rem 0.9rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.18rem rgba(37, 99, 235, 0.25);
            outline: none;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger-color);
        }

        .invalid-feedback {
            color: var(--danger-color);
            font-size: 0.82rem;
            margin-top: 0.22rem;
            font-weight: 500;
        }

        .calculation-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 2px solid var(--info-color);
            border-radius: 14px;
            padding: 1.3rem;
            margin-bottom: 1.8rem;
            transition: all 0.3s ease;
        }

        .calculation-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .auto-filled {
            background-color: #f0f9ff !important;
            border-color: #0891b2 !important;
            font-weight: 600;
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

        .btn-info {
            background: linear-gradient(135deg, var(--info-color) 0%, #22d3ee 100%);
            border: none;
            box-shadow: 0 4px 14px rgba(8, 145, 178, 0.3);
        }

        .btn-info:hover {
            transform: translateY(-1.5px);
            box-shadow: 0 5px 18px rgba(8, 145, 178, 0.4);
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

        /* Responsive Design */
        @media (max-width: 992px) {
            .form-container {
                margin: 1rem;
                padding: 1.3rem;
            }
            .row > div {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }
            .calculation-section, .dropdown-section, .section-card {
                padding: 1rem;
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
        }
    </style>
</head>
<body>
    <div class="container-fluid main-container">
        <div class="form-container fade-in">
            <div class="text-center mb-4">
                <h2>
                    <i class="fas fa-wallet text-primary"></i> Edit Aset Lancar
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('aset-lancars.index') }}">Aset Lancar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>

            @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: '{{ session('success') }}',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif

            @if(session('error') || $errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let errorMessages = '';
                        @if(session('error'))
                            errorMessages += '{{ session('error') }}\n';
                        @endif
                        @foreach ($errors->all() as $error)
                            errorMessages += '{{ $error }}\n';
                        @endforeach
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: errorMessages,
                        });
                    });
                </script>
            @endif

            <form id="asetLancarForm" action="{{ route('aset-lancars.update', $asetLancar) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-lg-8">
                        <!-- Rekening Section -->
                        <div class="dropdown-section">
                            <h4 class="section-title">
                                <i class="fas fa-list-alt"></i> Informasi Rekening
                            </h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Rekening Uraian <span class="required-field">*</span></label>
                                        <select class="form-select @error('rekening_uraian_id') is-invalid @enderror" 
                                                id="rekening_uraian_id" name="rekening_uraian_id" required>
                                            <option value="">Pilih Rekening Uraian</option>
                                            @foreach($rekeningUraians as $rekening)
                                                <option value="{{ $rekening->id }}" 
                                                        {{ old('rekening_uraian_id', $asetLancar->rekening_uraian_id) == $rekening->id ? 'selected' : '' }}
                                                        data-kode="{{ $rekening->kode_rekening }}">
                                                    {{ $rekening->kode_rekening }} - {{ $rekening->uraian }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('rekening_uraian_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Dasar Section -->
                        <div class="section-card">
                            <h4 class="section-title">
                                <i class="fas fa-info-circle"></i> Informasi Dasar
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kegiatan <span class="required-field">*</span></label>
                                        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" 
                                               id="nama_kegiatan" name="nama_kegiatan" 
                                               value="{{ old('nama_kegiatan', $asetLancar->nama_kegiatan) }}" 
                                               placeholder="Masukkan nama kegiatan" required>
                                        @error('nama_kegiatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Barang</label>
                                        <input type="text" class="form-control @error('uraian_jenis_barang') is-invalid @enderror" 
                                               id="uraian_jenis_barang" name="uraian_jenis_barang" 
                                               value="{{ old('uraian_jenis_barang', $asetLancar->uraian_jenis_barang) }}" 
                                               placeholder="Masukkan jenis barang">
                                        @error('uraian_jenis_barang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Uraian Kegiatan</label>
                                        <textarea class="form-control @error('uraian_kegiatan') is-invalid @enderror" 
                                                  id="uraian_kegiatan" name="uraian_kegiatan" rows="4"
                                                  placeholder="Masukkan uraian kegiatan">{{ old('uraian_kegiatan', $asetLancar->uraian_kegiatan) }}</textarea>
                                        @error('uraian_kegiatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Saldo Awal Section -->
                        <div class="section-card calculation-section">
                            <h4 class="section-title">
                                <i class="fas fa-balance-scale"></i> Saldo Awal
                            </h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Unit Barang <span class="required-field">*</span></label>
                                        <input type="number" class="form-control @error('saldo_awal_unit') is-invalid @enderror" 
                                               id="saldo_awal_unit" name="saldo_awal_unit" 
                                               value="{{ old('saldo_awal_unit', $asetLancar->saldo_awal_unit) }}" 
                                               min="0" step="1" required>
                                        @error('saldo_awal_unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Satuan <span class="required-field">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control @error('saldo_awal_harga_satuan') is-invalid @enderror" 
                                                   id="saldo_awal_harga_satuan" name="saldo_awal_harga_satuan" 
                                                   value="{{ old('saldo_awal_harga_satuan', $asetLancar->saldo_awal_harga_satuan) }}" 
                                                   min="0" step="0.01" required>
                                        </div>
                                        @error('saldo_awal_harga_satuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Total Nilai <small class="text-success">(Otomatis)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control auto-filled" 
                                                   id="saldo_awal_total" readonly 
                                                   value="{{ number_format($asetLancar->saldo_awal_total, 0) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mutasi Section -->
                        <div class="section-card calculation-section">
                            <h4 class="section-title">
                                <i class="fas fa-exchange-alt"></i> Mutasi Aset
                            </h4>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h6 class="text-success"><i class="fas fa-plus-circle"></i> Mutasi Tambah</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Unit Barang</label>
                                        <input type="number" class="form-control @error('mutasi_tambah_unit') is-invalid @enderror" 
                                               id="mutasi_tambah_unit" name="mutasi_tambah_unit" 
                                               value="{{ old('mutasi_tambah_unit', $asetLancar->mutasi_tambah_unit) }}" 
                                               min="0" step="1">
                                        @error('mutasi_tambah_unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Satuan</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control @error('mutasi_tambah_harga_satuan') is-invalid @enderror" 
                                                   id="mutasi_tambah_harga_satuan" name="mutasi_tambah_harga_satuan" 
                                                   value="{{ old('mutasi_tambah_harga_satuan', $asetLancar->mutasi_tambah_harga_satuan) }}" 
                                                   min="0" step="0.01">
                                        </div>
                                        @error('mutasi_tambah_harga_satuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Total Nilai <small class="text-success">(Otomatis)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control auto-filled" 
                                                   id="mutasi_tambah_nilai_total" readonly 
                                                   value="{{ number_format($asetLancar->mutasi_tambah_nilai_total, 0) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h6 class="text-danger"><i class="fas fa-minus-circle"></i> Mutasi Kurang</h6>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Unit Barang</label>
                                        <input type="number" class="form-control @error('mutasi_kurang_unit') is-invalid @enderror" 
                                               id="mutasi_kurang_unit" name="mutasi_kurang_unit" 
                                               value="{{ old('mutasi_kurang_unit', $asetLancar->mutasi_kurang_unit) }}" 
                                               min="0" step="1">
                                        @error('mutasi_kurang_unit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total Nilai <small class="text-muted">(Otomatis jika kosong)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control @error('mutasi_kurang_nilai_total') is-invalid @enderror" 
                                                   id="mutasi_kurang_nilai_total" name="mutasi_kurang_nilai_total" 
                                                   value="{{ old('mutasi_kurang_nilai_total', $asetLancar->mutasi_kurang_nilai_total) }}" 
                                                   min="0" step="0.01">
                                        </div>
                                        @error('mutasi_kurang_nilai_total')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <!-- Data Saat Ini Section -->
                        <div class="hierarchy-display fade-in">
                            <h6><i class="fas fa-database"></i> Data Saat Ini</h6>
                            <div class="hierarchy-item">
                                <span class="hierarchy-level">Rekening:</span> {{ $asetLancar->rekeningUraian->kode_rekening }} - {{ $asetLancar->rekeningUraian->uraian }}
                            </div>
                            <div class="hierarchy-item">
                                <span class="hierarchy-level">Dibuat:</span> {{ $asetLancar->created_at->format('d F Y H:i') }}
                            </div>
                            <div class="hierarchy-item">
                                <span class="hierarchy-level">Diperbarui:</span> {{ $asetLancar->updated_at->format('d F Y H:i') }}
                            </div>
                        </div>

                        <!-- Saldo Akhir Section -->
                        <div class="section-card calculation-section">
                            <h4 class="section-title">
                                <i class="fas fa-chart-line"></i> Saldo Akhir (Preview)
                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Unit Barang <small class="text-warning">(Otomatis)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                            <input type="text" class="form-control auto-filled text-warning" 
                                                   id="saldo_akhir_unit_preview" readonly 
                                                   value="{{ number_format($asetLancar->saldo_akhir_unit) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Total Nilai <small class="text-warning">(Otomatis)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control auto-filled text-warning" 
                                                   id="saldo_akhir_total_preview" readonly 
                                                   value="{{ number_format($asetLancar->saldo_akhir_total, 0) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info rounded-9 p-2">
                                <small><i class="fas fa-info-circle me-1"></i> Nilai akan diperbarui secara otomatis saat form diubah</small>
                            </div>
                        </div>

                        <!-- Validation Rules Section -->
                        <div class="section-card">
                            <h4 class="section-title">
                                <i class="fas fa-exclamation-triangle"></i> Aturan Validasi
                            </h4>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Harga satuan harus diisi (saldo awal atau mutasi tambah)</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Jika ada unit saldo awal, harga satuan saldo awal harus diisi</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Jika ada unit mutasi tambah, harga satuan mutasi tambah harus diisi</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i> Saldo akhir unit tidak boleh negatif</li>
                            </ul>
                        </div>

                        <!-- Action Buttons -->
                        <div class="section-card text-center">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Perbarui Data
                                </button>
                                <a href="{{ route('aset-lancars.show', $asetLancar) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Lihat Detail
                                </a>
                                <a href="{{ route('aset-lancars.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Format number function
            function formatNumber(num) {
                if (isNaN(num) || num === null || num === undefined) return '0';
                return Math.round(num).toLocaleString('id-ID');
            }

            // Calculate Saldo Awal
            function calculateSaldoAwal() {
                const unit = parseFloat(document.getElementById('saldo_awal_unit').value) || 0;
                const harga = parseFloat(document.getElementById('saldo_awal_harga_satuan').value) || 0;
                const total = unit * harga;
                const field = document.getElementById('saldo_awal_total');
                if (field) {
                    field.value = formatNumber(total);
                }
                updateSaldoAkhir();
            }

            // Calculate Mutasi Tambah
            function calculateMutasiTambah() {
                const unit = parseFloat(document.getElementById('mutasi_tambah_unit').value) || 0;
                const harga = parseFloat(document.getElementById('mutasi_tambah_harga_satuan').value) || 0;
                const total = unit * harga;
                const field = document.getElementById('mutasi_tambah_nilai_total');
                if (field) {
                    field.value = formatNumber(total);
                }
                updateSaldoAkhir();
            }

            // Update Saldo Akhir
            function updateSaldoAkhir() {
                try {
                    const saldoAwalUnit = parseFloat(document.getElementById('saldo_awal_unit').value) || 0;
                    const mutasiTambahUnit = parseFloat(document.getElementById('mutasi_tambah_unit').value) || 0;
                    const mutasiKurangUnit = parseFloat(document.getElementById('mutasi_kurang_unit').value) || 0;
                    const saldoAwalHarga = parseFloat(document.getElementById('saldo_awal_harga_satuan').value) || 0;
                    const mutasiTambahHarga = parseFloat(document.getElementById('mutasi_tambah_harga_satuan').value) || 0;
                    const mutasiKurangNilai = parseFloat(document.getElementById('mutasi_kurang_nilai_total').value) || 0;

                    // Calculate saldo akhir unit
                    const saldoAkhirUnit = saldoAwalUnit + mutasiTambahUnit - mutasiKurangUnit;

                    // Determine harga satuan
                    let hargaUntukSaldoAkhir = 0;
                    if (saldoAwalHarga > 0) {
                        hargaUntukSaldoAkhir = saldoAwalHarga;
                    } else if (mutasiTambahHarga > 0) {
                        hargaUntukSaldoAkhir = mutasiTambahHarga;
                    }

                    // Calculate saldo akhir total
                    const saldoAkhirTotal = saldoAkhirUnit > 0 && hargaUntukSaldoAkhir > 0 ? saldoAkhirUnit * hargaUntukSaldoAkhir : 0;

                    // Update preview
                    const unitField = document.getElementById('saldo_akhir_unit_preview');
                    const totalField = document.getElementById('saldo_akhir_total_preview');
                    if (unitField) unitField.value = formatNumber(saldoAkhirUnit);
                    if (totalField) totalField.value = formatNumber(saldoAkhirTotal);

                    // Auto-fill mutasi kurang nilai total
                    const mutasiKurangNilaiField = document.getElementById('mutasi_kurang_nilai_total');
                    if (mutasiKurangUnit > 0 && mutasiKurangNilai == 0 && hargaUntukSaldoAkhir > 0) {
                        mutasiKurangNilaiField.value = mutasiKurangUnit * hargaUntukSaldoAkhir;
                    }
                } catch (error) {
                    console.error('Error in calculation:', error);
                }
            }

            // Add event listeners
            function addCalculationListeners() {
                const inputFields = [
                    'saldo_awal_unit',
                    'saldo_awal_harga_satuan',
                    'mutasi_tambah_unit',
                    'mutasi_tambah_harga_satuan',
                    'mutasi_kurang_unit',
                    'mutasi_kurang_nilai_total'
                ];

                inputFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        field.addEventListener('input', () => {
                            if (fieldId.includes('saldo_awal')) calculateSaldoAwal();
                            else if (fieldId.includes('mutasi_tambah')) calculateMutasiTambah();
                            else updateSaldoAkhir();
                        });
                        field.addEventListener('change', () => {
                            if (fieldId.includes('saldo_awal')) calculateSaldoAwal();
                            else if (fieldId.includes('mutasi_tambah')) calculateMutasiTambah();
                            else updateSaldoAkhir();
                        });
                    }
                });
            }

            // Form submission handler
            const form = document.getElementById('asetLancarForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const saldoAwalHarga = parseFloat(document.getElementById('saldo_awal_harga_satuan').value) || 0;
                    const mutasiTambahHarga = parseFloat(document.getElementById('mutasi_tambah_harga_satuan').value) || 0;
                    const saldoAwalUnit = parseFloat(document.getElementById('saldo_awal_unit').value) || 0;
                    const mutasiTambahUnit = parseFloat(document.getElementById('mutasi_tambah_unit').value) || 0;
                    const mutasiKurangUnit = parseFloat(document.getElementById('mutasi_kurang_unit').value) || 0;
                    const saldoAkhirUnit = saldoAwalUnit + mutasiTambahUnit - mutasiKurangUnit;

                    // Validation
                    if (saldoAwalHarga === 0 && mutasiTambahHarga === 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Harga satuan harus diisi, baik di Saldo Awal atau Mutasi Tambah.'
                        });
                        return;
                    }

                    if (saldoAwalUnit > 0 && saldoAwalHarga === 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jika ada unit saldo awal, harga satuan saldo awal harus diisi.'
                        });
                        return;
                    }

                    if (mutasiTambahUnit > 0 && mutasiTambahHarga === 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jika ada unit mutasi tambah, harga satuan mutasi tambah harus diisi.'
                        });
                        return;
                    }

                    if (saldoAkhirUnit < 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Peringatan',
                            text: 'Saldo Akhir Unit tidak boleh negatif. Silakan periksa kembali data mutasi Anda.'
                        });
                        return;
                    }

                    // Show loading
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Sedang memproses pembaruan data aset lancar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                });
            }

            // Initialize
            addCalculationListeners();
            calculateSaldoAwal();
            calculateMutasiTambah();
            updateSaldoAkhir();
        });
    </script>
</body>
</html>