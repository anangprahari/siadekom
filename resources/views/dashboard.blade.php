@extends('layouts.tabler')

@section('title', 'Dashboard')

@push('page-styles')
    <style>
        /* Modern Blue Professional Theme - Enhanced with Card 1 Styling */
        :root {
            --blue-primary: #1e40af;
            --blue-secondary: #2563eb;
            --blue-light: #dbeafe;
            --blue-extra-light: #eff6ff;
            --blue-dark: #1e3a8a;
            --indigo-primary: #3730a3;
            --purple-primary: #5b21b6;
            --green-primary: #047857;
            --orange-primary: #b45309;
            --red-primary: #b91c1c;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;

            --shadow-light: 0 1px 3px 0 rgba(30, 64, 175, 0.1), 0 1px 2px 0 rgba(30, 64, 175, 0.06);
            --shadow-medium: 0 4px 6px -1px rgba(30, 64, 175, 0.1), 0 2px 4px -1px rgba(30, 64, 175, 0.06);
            --shadow-large: 0 10px 15px -3px rgba(30, 64, 175, 0.1), 0 4px 6px -2px rgba(30, 64, 175, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(30, 64, 175, 0.1), 0 10px 10px -5px rgba(30, 64, 175, 0.04);
            --shadow-blue: 0 4px 14px 0 rgba(30, 64, 175, 0.15);

            --gradient-blue: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            --gradient-blue-dark: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            --gradient-purple: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --gradient-green: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            --gradient-orange: linear-gradient(135deg, #ffedd5 0%, #fed7aa 100%);

            --border-radius: 8px;
            --border-radius-sm: 6px;
            --border-radius-md: 8px;
            --border-radius-lg: 12px;
            --border-radius-xl: 16px;

            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-fast: all 0.15s ease;
            --transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Reset container fluid margins */
        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
            max-width: none !important;
        }

        /* Dashboard Container - Override default container */
        .dashboard-container {
            padding: 1rem;
            max-width: 100%;
            margin: 0;
        }

        /* Global Styles */
        body {
            background-color: #f8fafc;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.5;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #005eff 0%, #0047cc 100%);
            height: 120px;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-large);
            display: flex;
            align-items: center;
        }

        /* Hapus pseudo-element before yang tidak diperlukan */
        .dashboard-header::before {
            content: none;
        }

        /* Sesuaikan posisi konten */
        .dashboard-header .content {
            width: 100%;
        }

        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.025em;
        }

        .dashboard-subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
            margin: 0.5rem 0 0 0;
            font-weight: 400;
        }

        .dashboard-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            opacity: 0.8;
            margin-top: 0.75rem;
        }

        /* Summary Statistics Section - Adapted from Code 1 */
        .summary-stats {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--gray-200);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
        }

        .summary-item {
            text-align: center;
            padding: 1rem;
            border-radius: var(--border-radius-md);
            background: var(--blue-extra-light);
            border: 1px solid var(--blue-light);
            transition: var(--transition);
        }

        .summary-item:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-medium);
            border-color: var(--blue-primary);
        }

        .summary-value {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .summary-value.text-blue {
            color: var(--blue-primary);
        }

        .summary-value.text-green {
            color: var(--green-primary);
        }

        .summary-value.text-purple {
            color: var(--purple-primary);
        }

        .summary-value.text-orange {
            color: var(--orange-primary);
        }

        .summary-label {
            font-size: 0.75rem;
            color: var(--gray-600);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Quick Actions Section - Adapted from Code 1 */
        .quick-actions {
            margin-bottom: 1.5rem;
        }

        .quick-actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
        }

        .quick-action-card {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 1.25rem;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .quick-action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-blue);
            transition: var(--transition);
        }

        .quick-action-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-large);
            border-color: var(--blue-light);
        }

        .quick-action-card:hover::before {
            height: 6px;
        }

        .quick-action-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .quick-action-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: white;
            box-shadow: var(--shadow-light);
        }

        .quick-action-icon.bg-blue {
            background: var(--gradient-blue-dark);
        }

        .quick-action-icon.bg-green {
            background: linear-gradient(135deg, #047857 0%, #10b981 100%);
        }

        .quick-action-icon.bg-purple {
            background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);
        }

        .quick-action-icon.bg-orange {
            background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);
        }

        .quick-action-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .quick-action-description {
            color: var(--gray-600);
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }

        .quick-action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        /* Modern Stat Card Styling - Adapted from Code 1 */
        .stat-card {
            background: white;
            border-radius: var(--border-radius-md);
            padding: 1rem;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
            height: 100%;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            transition: var(--transition);
        }

        .stat-card.border-blue::before {
            background: var(--blue-primary);
        }

        .stat-card.border-green::before {
            background: var(--green-primary);
        }

        .stat-card.border-purple::before {
            background: var(--purple-primary);
        }

        .stat-card.border-orange::before {
            background: var(--orange-primary);
        }

        .stat-card.border-red::before {
            background: var(--red-primary);
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-large);
            border-color: var(--blue-light);
        }

        .stat-card:hover::before {
            width: 6px;
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }

        .stat-icon {
            width: 32px;
            height: 32px;
            border-radius: var(--border-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            color: white;
            box-shadow: var(--shadow-light);
        }

        .stat-title {
            font-size: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--gray-600);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-size: 1rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .stat-description {
            font-size: 0.6875rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-trend {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 500;
            font-size: 0.625rem;
        }

        .stat-trend.positive {
            color: var(--green-primary);
        }

        .stat-trend.neutral {
            color: var(--gray-400);
        }

        /* Modern Button Styles - Adapted from Code 1 */
        .btn {
            border-radius: var(--border-radius-sm);
            font-weight: 500;
            letter-spacing: 0.025em;
            transition: var(--transition);
            border: none;
            box-shadow: var(--shadow-light);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.375rem;
            font-size: 0.75rem;
            padding: 0.5rem 0.875rem;
            line-height: 1.25;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s ease, height 0.3s ease;
        }

        .btn:hover::before {
            width: 200px;
            height: 200px;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-medium);
        }

        .btn-primary {
            background: var(--gradient-blue-dark);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #047857 0%, #10b981 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, #0369a1 0%, #0ea5e9 100%);
            color: white;
        }

        .btn-outline-primary {
            border: 1px solid var(--blue-primary);
            color: var(--blue-primary);
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: var(--blue-primary);
            color: white;
        }

        .btn-ghost {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-ghost:hover {
            background: var(--gray-200);
            color: var(--gray-800);
        }

        /* Alert Styles - Adapted from Code 1 */
        .alert {
            border: none;
            border-radius: var(--border-radius-md);
            box-shadow: var(--shadow-medium);
            border-left: 4px solid;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            border-left-color: var(--green-primary);
            color: #166534;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left-color: var(--red-primary);
            color: #991b1b;
        }

        /* Section Headings */
        .section-heading {
            color: var(--gray-800);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .section-heading i {
            color: var(--blue-primary);
        }

        /* Recent Activities Enhanced */
        .activity-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            border: 1px solid transparent;
            margin-bottom: 0.5rem;
        }

        .activity-item:hover {
            background: var(--blue-extra-light);
            border-color: var(--blue-light);
            transform: translateX(2px);
        }

        .activity-item .stat-icon {
            width: 32px;
            height: 32px;
            font-size: 0.875rem;
            margin-right: 0.75rem;
        }

        .activity-item h6 {
            font-size: 0.75rem;
            margin-bottom: 0.125rem;
            color: var(--gray-800);
            font-weight: 600;
        }

        .activity-item small {
            font-size: 0.625rem;
            color: var(--gray-500);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .dashboard-container {
                padding: 0.75rem;
            }

            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .stat-card {
                padding: 0.75rem;
            }

            .stat-value {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 0.5rem;
            }

            .dashboard-header {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .dashboard-title {
                font-size: 1.25rem;
            }

            .dashboard-subtitle {
                font-size: 0.75rem;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }

            .summary-item {
                padding: 0.75rem;
            }

            .summary-value {
                font-size: 1.125rem;
            }

            .quick-actions-grid {
                grid-template-columns: 1fr;
            }

            .quick-action-card {
                padding: 1rem;
            }

            .quick-action-icon {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
            }

            .section-heading {
                font-size: 0.8125rem;
            }
        }

        @media (max-width: 576px) {
            .dashboard-container {
                padding: 0.5rem;
            }

            .stat-card {
                padding: 0.75rem;
            }

            .stat-value {
                font-size: 0.8125rem;
            }

            .stat-description {
                font-size: 0.625rem;
            }

            .btn {
                font-size: 0.6875rem;
                padding: 0.375rem 0.75rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }

        .animate-delay-1 {
            animation-delay: 0.1s;
        }

        .animate-delay-2 {
            animation-delay: 0.2s;
        }

        .animate-delay-3 {
            animation-delay: 0.3s;
        }

        .animate-delay-4 {
            animation-delay: 0.4s;
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .spinner {
            width: 14px;
            height: 14px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush

@section('content')
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="dashboard-header animate-fade-in-up">
            <div class="content">
                <h1 class="dashboard-title">Beranda Manajemen Aset</h1>
                <p class="dashboard-subtitle">Sistem Informasi Manajemen Aset Tetap, Lainnya, & Lancar</p>
                <div class="dashboard-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ now()->format('d F Y') }}
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger animate-fade-in-up">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Summary Statistics Section -->
        <div class="summary-stats animate-fade-in-up animate-delay-1">
            <h3 class="section-heading">
                <i class="fas fa-chart-pie"></i>
                Ringkasan Statistik
            </h3>
            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-value text-blue">
                        {{ format_number_id(($totalAsetTetap ?? 0) + ($totalAsetLainnya ?? 0) + ($totalAsetLancar ?? 0)) }}
                    </div>
                    <div class="summary-label">Total Semua Aset</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value text-green">
                        Rp
                        {{ format_number_id(($nilaiTotalAsetTetap ?? 0) + ($nilaiTotalAsetLainnya ?? 0) + ($nilaiSaldoAkhirTotal ?? 0)) }}
                    </div>
                    <div class="summary-label">Total Nilai Aset</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value text-purple">
                        {{ format_number_id(($asetBaik ?? 0) + ($asetLainnyaBaik ?? 0)) }}
                    </div>
                    <div class="summary-label">Aset Kondisi Baik</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value text-orange">
                        {{ format_number_id(($asetKurangBaik ?? 0) + ($asetRusakBerat ?? 0) + ($asetLainnyaKurangBaik ?? 0) + ($asetLainnyaRusakBerat ?? 0)) }}
                    </div>
                    <div class="summary-label">Aset Bermasalah</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions Section -->
        <div class="quick-actions animate-fade-in-up animate-delay-2">
            <h3 class="section-heading">
                <i class="fas fa-bolt"></i>
                Aksi Cepat
            </h3>
            <div class="quick-actions-grid">
                <div class="quick-action-card">
                    <div class="quick-action-header">
                        <div class="quick-action-icon bg-blue">
                            <i class="fas fa-building"></i>
                        </div>
                        <h4 class="quick-action-title">Manajemen Aset Tetap & Lainnya</h4>
                    </div>
                    <p class="quick-action-description">
                        Kelola aset tetap seperti bangunan, kendaraan, peralatan dan inventaris lainnya.
                    </p>
                    <div class="quick-action-buttons">
                        <a href="{{ route('asets.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambah Aset
                        </a>
                        <a href="{{ route('asets.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>

                <div class="quick-action-card">
                    <div class="quick-action-header">
                        <div class="quick-action-icon bg-green">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h4 class="quick-action-title">Manajemen Aset Lancar</h4>
                    </div>
                    <p class="quick-action-description">
                        Kelola aset lancar seperti kas, persediaan, dan piutang untuk operasional harian.
                    </p>
                    <div class="quick-action-buttons">
                        <a href="{{ route('aset-lancars.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Tambah Aset
                        </a>
                        <a href="{{ route('aset-lancars.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list"></i>
                            Lihat Semua
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Asset Statistics Grid -->
        <div class="row animate-fade-in-up animate-delay-3">
            <div class="col-12 mb-3">
                <h3 class="section-heading">
                    <i class="fas fa-chart-line"></i>
                    Detail Statistik Aset
                </h3>
            </div>

            <!-- Aset Tetap Statistics -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-blue">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: var(--gradient-blue-dark);">
                            <i class="fas fa-building"></i>
                        </div>
                    </div>
                    <div class="stat-title">Total Aset Tetap</div>
                    <div class="stat-value">{{ format_number_id($totalAsetTetap ?? 0) }}</div>
                    <div class="stat-description">
                        <span class="stat-trend positive">
                            <i class="fas fa-plus"></i>
                            {{ $asetTetapBaru ?? 0 }}
                        </span>
                        baru (30 hari)
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-green">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="stat-title">Nilai Aset Tetap</div>
                    <div class="stat-value">Rp {{ format_number_id($nilaiTotalAsetTetap ?? 0, 0, ',', '.') }}</div>
                    <div class="stat-description">Total nilai investasi</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-blue">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: var(--gradient-blue-dark);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="stat-title">Aset Tetap Kondisi Baik</div>
                    <div class="stat-value">{{ format_number_id($asetBaik ?? 0) }}</div>
                    <div class="stat-description">Kondisi baik dan berfungsi</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-orange">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                    <div class="stat-title">Aset Tetap Bermasalah</div>
                    <div class="stat-value">{{ format_number_id(($asetKurangBaik ?? 0) + ($asetRusakBerat ?? 0)) }}</div>
                    <div class="stat-description">
                        KB: {{ $asetKurangBaik ?? 0 }} | RB: {{ $asetRusakBerat ?? 0 }}
                    </div>
                </div>
            </div>

            <!-- Aset Lainnya Statistics -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-purple">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                    <div class="stat-title">Total Aset Lainnya</div>
                    <div class="stat-value">{{ format_number_id($totalAsetLainnya ?? 0) }}</div>
                    <div class="stat-description">
                        <span class="stat-trend positive">
                            <i class="fas fa-plus"></i>
                            {{ $asetLainnyaBaru ?? 0 }}
                        </span>
                        baru (30 hari)
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-green">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                    <div class="stat-title">Nilai Aset Lainnya</div>
                    <div class="stat-value">Rp {{ format_number_id($nilaiTotalAsetLainnya ?? 0, 0, ',', '.') }}</div>
                    <div class="stat-description">Total nilai aset lainnya</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-green">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                    </div>
                    <div class="stat-title">Aset Lainnya Kondisi Baik</div>
                    <div class="stat-value">{{ format_number_id($asetLainnyaBaik ?? 0) }}</div>
                    <div class="stat-description">Kondisi baik dan berfungsi</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-red">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #b91c1c 0%, #ef4444 100%);">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="stat-title">Aset Lainnya Bermasalah</div>
                    <div class="stat-value">
                        {{ format_number_id(($asetLainnyaKurangBaik ?? 0) + ($asetLainnyaRusakBerat ?? 0)) }}</div>
                    <div class="stat-description">
                        KB: {{ $asetLainnyaKurangBaik ?? 0 }} | RB: {{ $asetLainnyaRusakBerat ?? 0 }}
                    </div>
                </div>
            </div>

            <!-- Aset Lancar & Additional Statistics -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-blue">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: var(--gradient-blue-dark);">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                    <div class="stat-title">Total Aset Lancar</div>
                    <div class="stat-value">{{ format_number_id($totalAsetLancar ?? 0) }}</div>
                    <div class="stat-description">Total item aset lancar</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-green">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="stat-title">Saldo Akhir Total</div>
                    <div class="stat-value">Rp {{ format_number_id($nilaiSaldoAkhirTotal ?? 0, 0, ',', '.') }}</div>
                    <div class="stat-description">Total nilai saldo akhir</div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-purple">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-title">Total Pengguna</div>
                    <div class="stat-value">{{ format_number_id($totalPengguna ?? 0) }}</div>
                    <div class="stat-description">
                        <span class="stat-trend positive">
                            <i class="fas fa-plus"></i>
                            {{ $penggunaBaru ?? 0 }}
                        </span>
                        baru (30 hari)
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="stat-card border-orange">
                    <div class="stat-header">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                    </div>
                    <div class="stat-title">Aktivitas Bulan Ini</div>
                    <div class="stat-value">
                        {{ ($asetTetapBulanIni ?? 0) + ($asetLainnyaBulanIni ?? 0) + ($asetLancarBulanIni ?? 0) }}</div>
                    <div class="stat-description">
                        Tetap: {{ $asetTetapBulanIni ?? 0 }} |
                        Lainnya: {{ $asetLainnyaBulanIni ?? 0 }} |
                        Lancar: {{ $asetLancarBulanIni ?? 0 }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="row animate-fade-in-up animate-delay-4">
            <div class="col-12">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="section-heading" style="margin: 0;">
                            <i class="fas fa-history"></i>
                            Aktivitas Terbaru
                        </h4>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="activity-item"
                                style="background: var(--blue-extra-light); border: 1px solid var(--blue-light);">
                                <div class="stat-icon" style="background: var(--gradient-blue-dark);">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <h6>{{ $asetTetapBaru ?? 0 }} Aset Tetap & Lainnya Baru</h6>
                                    <small>30 hari terakhir</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="activity-item" style="background: #dcfce7; border: 1px solid #bbf7d0;">
                                <div class="stat-icon"
                                    style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <h6>{{ $asetLainnyaBaru ?? 0 }} Aset Lainnya Baru</h6>
                                    <small>30 hari terakhir</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="activity-item" style="background: #fef3c7; border: 1px solid #fcd34d;">
                                <div class="stat-icon"
                                    style="background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h6>{{ $penggunaBaru ?? 0 }} Pengguna Baru</h6>
                                    <small>30 hari terakhir</small>
                                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Add loading states to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.disabled) {
                        const originalContent = this.innerHTML;
                        this.innerHTML = '<div class="spinner me-2"></div>Loading...';
                        this.disabled = true;

                        // Reset after 2 seconds (remove this in production)
                        setTimeout(() => {
                            this.innerHTML = originalContent;
                            this.disabled = false;
                        }, 2000);
                    }
                });
            });

            // Animate statistics on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all stat cards
            document.querySelectorAll('.stat-card, .quick-action-card, .summary-item').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(10px)';
                card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                observer.observe(card);
            });

            // Add hover effects for interactive elements
            document.querySelectorAll('.stat-card, .quick-action-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Console log dashboard initialization
            console.log('Modern Dashboard initialized successfully');
            console.log('Total Assets:',
                {{ ($totalAsetTetap ?? 0) + ($totalAsetLainnya ?? 0) + ($totalAsetLancar ?? 0) }});
            console.log('Assets in Good Condition:', {{ ($asetBaik ?? 0) + ($asetLainnyaBaik ?? 0) }});
        });
    </script>
@endpush
