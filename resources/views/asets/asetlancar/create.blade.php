<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Aset Lancar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css"
        rel="stylesheet">
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

        .dropdown-section,
        .section-card {
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

        .form-control,
        .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 9px;
            padding: 0.65rem 0.9rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.18rem rgba(37, 99, 235, 0.25);
            outline: none;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
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

        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #f59e0b 100%);
            border: none;
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-1.5px);
            box-shadow: 0 5px 18px rgba(217, 119, 6, 0.4);
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
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
            }

            .calculation-section {
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
                    <i class="fas fa-wallet text-primary"></i> Form Tambah Aset Lancar
                </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('aset-lancars.index') }}">Aset Lancar</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>

            @if ($errors->any())
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let errorMessages = '';
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

            <form id="asetLancarForm" action="{{ route('aset-lancars.store') }}" method="POST">
                @csrf

                <!-- Rekening Section -->
                <div class="dropdown-section">
                    <h4 class="section-title">
                        <i class="fas fa-list-alt"></i> Informasi Rekening
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nomor Rekening & Uraian <span
                                        class="required-field">*</span></label>
                                <select class="form-select @error('rekening_uraian_id') is-invalid @enderror"
                                    id="rekening_uraian_id" name="rekening_uraian_id" required>
                                    <option value="">Pilih Nomor Rekening & Uraian</option>
                                    @foreach ($rekeningUraians as $rekening)
                                        <option value="{{ $rekening->id }}"
                                            {{ old('rekening_uraian_id') == $rekening->id ? 'selected' : '' }}
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

                <!-- Kegiatan Section -->
                <div class="section-card">
                    <h4 class="section-title">
                        <i class="fas fa-tasks"></i> Informasi Kegiatan
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                    id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}"
                                    placeholder="Masukkan nama kegiatan">
                                @error('nama_kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Uraian Jenis/Barang</label>
                                <input type="text"
                                    class="form-control @error('uraian_jenis_barang') is-invalid @enderror"
                                    id="uraian_jenis_barang" name="uraian_jenis_barang"
                                    value="{{ old('uraian_jenis_barang') }}"
                                    placeholder="Masukkan uraian jenis/barang">
                                @error('uraian_jenis_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Uraian Kegiatan</label>
                                <textarea class="form-control @error('uraian_kegiatan') is-invalid @enderror" id="uraian_kegiatan"
                                    name="uraian_kegiatan" rows="4" placeholder="Masukkan uraian detail kegiatan">{{ old('uraian_kegiatan') }}</textarea>
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
                                <input type="number"
                                    class="form-control @error('saldo_awal_unit') is-invalid @enderror"
                                    id="saldo_awal_unit" name="saldo_awal_unit" value="{{ old('saldo_awal_unit', 0) }}"
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
                                    <input type="number"
                                        class="form-control @error('saldo_awal_harga_satuan') is-invalid @enderror"
                                        id="saldo_awal_harga_satuan" name="saldo_awal_harga_satuan"
                                        value="{{ old('saldo_awal_harga_satuan', 0) }}" min="0"
                                        step="1" required>
                                </div>
                                @error('saldo_awal_harga_satuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nilai Total <small
                                        class="text-success">(Otomatis)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control auto-filled"
                                        id="saldo_awal_total_display" readonly placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mutasi Section -->
                <div class="section-card calculation-section">
                    <h4 class="section-title">
                        <i class="fas fa-exchange-alt"></i> Mutasi
                    </h4>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="text-success"><i class="fas fa-plus-circle"></i> Mutasi Tambah</h6>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="number"
                                    class="form-control @error('mutasi_tambah_unit') is-invalid @enderror"
                                    id="mutasi_tambah_unit" name="mutasi_tambah_unit"
                                    value="{{ old('mutasi_tambah_unit', 0) }}" min="0" step="1">
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
                                    <input type="number"
                                        class="form-control @error('mutasi_tambah_harga_satuan') is-invalid @enderror"
                                        id="mutasi_tambah_harga_satuan" name="mutasi_tambah_harga_satuan"
                                        value="{{ old('mutasi_tambah_harga_satuan', 0) }}" min="0"
                                        step="1">
                                </div>
                                @error('mutasi_tambah_harga_satuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nilai Total <small
                                        class="text-success">(Otomatis)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control auto-filled"
                                        id="mutasi_tambah_nilai_total_display" readonly placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6 class="text-danger"><i class="fas fa-minus-circle"></i> Mutasi Kurang</h6>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="number"
                                    class="form-control @error('mutasi_kurang_unit') is-invalid @enderror"
                                    id="mutasi_kurang_unit" name="mutasi_kurang_unit"
                                    value="{{ old('mutasi_kurang_unit', 0) }}" min="0" step="1">
                                @error('mutasi_kurang_unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nilai Total</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number"
                                        class="form-control @error('mutasi_kurang_nilai_total') is-invalid @enderror"
                                        id="mutasi_kurang_nilai_total" name="mutasi_kurang_nilai_total"
                                        value="{{ old('mutasi_kurang_nilai_total', 0) }}" min="0"
                                        step="1">
                                </div>
                                @error('mutasi_kurang_nilai_total')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Saldo Akhir Section -->
                <div class="section-card calculation-section">
                    <h4 class="section-title">
                        <i class="fas fa-chart-line"></i> Saldo Akhir
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Unit Barang <small
                                        class="text-warning">(Otomatis)</small></label>
                                <input type="text" class="form-control auto-filled text-warning"
                                    id="saldo_akhir_unit_display" readonly placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nilai Total <small
                                        class="text-warning">(Otomatis)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control auto-filled text-warning"
                                        id="saldo_akhir_total_display" readonly placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-4">
                    <a href="{{ route('aset-lancars.index') }}" class="btn btn-secondary me-3">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="reset" class="btn btn-warning me-3">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
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
        document.addEventListener('DOMContentLoaded', function() {
            // Format number function
            function formatNumber(num) {
                if (isNaN(num) || num === null || num === undefined) return '0';
                return Math.round(num).toLocaleString('id-ID');
            }

            // Update calculations
            function updateCalculations() {
                try {
                    const saldoAwalUnit = parseFloat(document.getElementById('saldo_awal_unit').value) || 0;
                    const saldoAwalHargaSatuan = parseFloat(document.getElementById('saldo_awal_harga_satuan')
                        .value) || 0;
                    const mutasiTambahUnit = parseFloat(document.getElementById('mutasi_tambah_unit').value) || 0;
                    const mutasiTambahHargaSatuan = parseFloat(document.getElementById('mutasi_tambah_harga_satuan')
                        .value) || 0;
                    const mutasiKurangUnit = parseFloat(document.getElementById('mutasi_kurang_unit').value) || 0;
                    const mutasiKurangNilaiTotal = parseFloat(document.getElementById('mutasi_kurang_nilai_total')
                        .value) || 0;

                    // Determine harga satuan
                    let hargaSatuan = 0;
                    if (saldoAwalHargaSatuan > 0) {
                        hargaSatuan = saldoAwalHargaSatuan;
                    } else if (mutasiTambahHargaSatuan > 0) {
                        hargaSatuan = mutasiTambahHargaSatuan;
                    }

                    // Calculate Saldo Awal Total
                    const saldoAwalTotal = saldoAwalUnit * saldoAwalHargaSatuan;
                    const saldoAwalTotalField = document.getElementById('saldo_awal_total_display');
                    if (saldoAwalTotalField) {
                        saldoAwalTotalField.value = formatNumber(saldoAwalTotal);
                    }

                    // Calculate Mutasi Tambah Nilai Total
                    const mutasiTambahNilaiTotal = mutasiTambahUnit * mutasiTambahHargaSatuan;
                    const mutasiTambahField = document.getElementById('mutasi_tambah_nilai_total_display');
                    if (mutasiTambahField) {
                        mutasiTambahField.value = formatNumber(mutasiTambahNilaiTotal);
                    }

                    // Calculate Saldo Akhir Unit
                    const saldoAkhirUnit = saldoAwalUnit + mutasiTambahUnit - mutasiKurangUnit;
                    const saldoAkhirUnitField = document.getElementById('saldo_akhir_unit_display');
                    if (saldoAkhirUnitField) {
                        saldoAkhirUnitField.value = formatNumber(saldoAkhirUnit);
                    }

                    // Calculate Saldo Akhir Total
                    let saldoAkhirTotal = 0;
                    if (saldoAkhirUnit > 0 && hargaSatuan > 0) {
                        saldoAkhirTotal = saldoAkhirUnit * hargaSatuan;
                    }
                    const saldoAkhirTotalField = document.getElementById('saldo_akhir_total_display');
                    if (saldoAkhirTotalField) {
                        saldoAkhirTotalField.value = formatNumber(saldoAkhirTotal);
                    }

                    // Auto-fill mutasi kurang nilai total
                    const mutasiKurangNilaiTotalField = document.getElementById('mutasi_kurang_nilai_total');
                    if (mutasiKurangUnit > 0 && hargaSatuan > 0) {
                        const autoKurangTotal = mutasiKurangUnit * hargaSatuan;
                        // Update otomatis berdasarkan harga satuan yang benar
                        mutasiKurangNilaiTotalField.value = autoKurangTotal;
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
                        field.addEventListener('input', updateCalculations);
                        field.addEventListener('change', updateCalculations);
                    }
                });
            }

            // Form submission handler
            const form = document.getElementById('asetLancarForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const saldoAwalUnit = parseFloat(document.getElementById('saldo_awal_unit').value) || 0;
                    const saldoAwalHargaSatuan = parseFloat(document.getElementById(
                        'saldo_awal_harga_satuan').value) || 0;
                    const mutasiTambahUnit = parseFloat(document.getElementById('mutasi_tambah_unit')
                        .value) || 0;
                    const mutasiTambahHargaSatuan = parseFloat(document.getElementById(
                        'mutasi_tambah_harga_satuan').value) || 0;
                    const mutasiKurangUnit = parseFloat(document.getElementById('mutasi_kurang_unit')
                        .value) || 0;

                    // Validation
                    if (saldoAwalHargaSatuan == 0 && mutasiTambahHargaSatuan == 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Harga satuan harus diisi, baik di Saldo Awal atau Mutasi Tambah.'
                        });
                        return;
                    }

                    if (saldoAwalUnit > 0 && saldoAwalHargaSatuan == 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jika ada unit saldo awal, harga satuan saldo awal harus diisi.'
                        });
                        return;
                    }

                    if (mutasiTambahUnit > 0 && mutasiTambahHargaSatuan == 0) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Jika ada unit mutasi tambah, harga satuan mutasi tambah harus diisi.'
                        });
                        return;
                    }

                    const totalUnit = saldoAwalUnit + mutasiTambahUnit - mutasiKurangUnit;
                    if (totalUnit < 0) {
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
                        text: 'Sedang memproses data aset lancar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                });
            }

            // Reset form handler
            const resetButton = document.querySelector('button[type="reset"]');
            if (resetButton) {
                resetButton.addEventListener('click', function() {
                    setTimeout(updateCalculations, 200);
                });
            }

            // Initialize
            addCalculationListeners();
            updateCalculations();
        });
    </script>
</body>

</html>
