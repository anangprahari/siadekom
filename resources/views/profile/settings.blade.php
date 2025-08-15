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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M12 1v6m0 6v6m6-15l-5.2 3m-1.6 3l-5.2 3m12.4-6l-5.2-3m-1.6-3l-5.2-3"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="page-title mb-0">Pengaturan Akun</h2>
                            <div class="text-muted mt-1">Kelola keamanan dan preferensi akun Anda</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l14 0"></path>
                                <path d="M13 18l6 -6"></path>
                                <path d="M13 6l6 6"></path>
                            </svg>
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
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

        <!-- Navigation Tabs -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body p-3">
                <nav class="nav nav-borders">
                    <a class="nav-link fw-bold" href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                        Profil
                    </a>
                    <a class="nav-link active fw-bold" href="{{ route('profile.settings') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M12 1v6m0 6v6m6-15l-5.2 3m-1.6 3l-5.2 3m12.4-6l-5.2-3m-1.6-3l-5.2-3"></path>
                        </svg>
                        Pengaturan
                    </a>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Change Password -->
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                        <circle cx="12" cy="16" r="1"></circle>
                                        <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Ubah Password</h3>
                                <div class="text-muted small">Perbarui password untuk keamanan akun</div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('password.update') }}" method="POST" id="passwordForm">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Current Password -->
                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold text-blue required">Password Saat Ini</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                                <circle cx="12" cy="16" r="1"></circle>
                                                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                            </svg>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" data-password-toggle="current" required
                                            placeholder="Masukkan password saat ini">
                                        <button type="button" class="input-group-text bg-blue-lt text-blue"
                                            data-toggle-target="current">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('current_password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- New Password -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-blue required">Password Baru</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                                <circle cx="12" cy="16" r="1"></circle>
                                                <path d="M8 11v-5a4 4 0 0 1 8 0v5"></path>
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="newPassword" data-password-toggle="new" required
                                            placeholder="Masukkan password baru">
                                        <button type="button" class="input-group-text bg-blue-lt text-blue"
                                            data-toggle-target="new">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="form-text">Minimal 8 karakter</div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-blue required">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="confirmPassword" data-password-toggle="confirm"
                                            required placeholder="Konfirmasi password baru">
                                        <button type="button" class="input-group-text bg-blue-lt text-blue"
                                            data-toggle-target="confirm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon eye-icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password Strength Indicator -->
                                <div class="col-12 mb-3">
                                    <div id="passwordStrength" class="password-strength d-none">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <small class="text-muted">Kekuatan Password:</small>
                                            <small id="strengthText" class="fw-bold"></small>
                                        </div>
                                        <div class="progress" style="height: 6px;">
                                            <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-blue-lt border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path d="m9 12l2 2l4 -4"></path>
                                    </svg>
                                    Password akan diperbarui dengan aman
                                </div>
                                <button type="submit" class="btn btn-blue" id="submitPasswordBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14,4 14,8 8,8 8,4"></polyline>
                                    </svg>
                                    Simpan Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Tips -->
        <div class="row mt-4">
            <div class="col-lg-8 mx-auto">
                <div class="card bg-blue-lt border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <path d="m13.707 9.707l1.586 -1.586a2 2 0 0 1 2.828 0l1.586 1.586a2 2 0 0 1 0 2.828l-1.586 1.586"></path>
                                        <path d="m10.293 14.293l-1.586 1.586a2 2 0 0 1 -2.828 0l-1.586 -1.586a2 2 0 0 1 0 -2.828l1.586 -1.586"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-blue mb-2">Tips Keamanan Password</h4>
                                <ul class="list-unstyled text-muted mb-0">
                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-green" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol
                                    </li>
                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-green" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        Minimal 8 karakter untuk keamanan yang lebih baik
                                    </li>
                                    <li class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-green" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        Jangan menggunakan informasi pribadi yang mudah ditebak
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-green" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        Perbarui password secara berkala untuk menjaga keamanan
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-styles')
    <style>
        /* Blue Light Theme Styling - Enhanced and Cleaned */
        :root {
            --blue-primary: #2563eb;
            --blue-secondary: #3b82f6;
            --blue-light: #dbeafe;
            --blue-extra-light: #eff6ff;
            --blue-dark: #1e40af;
            --green-primary: #16a34a;
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

        .card-footer {
            background: var(--gradient-blue);
            border: none;
            padding: 1.5rem;
        }

        .form-label.required::after {
            content: ' *';
            color: #dc3545;
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

        .bg-blue-lt {
            background-color: var(--blue-light) !important;
            color: var(--blue-dark) !important;
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
            border-left-color: var(--green-primary);
            color: #166534;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left-color: #dc2626;
            color: #991b1b;
        }

        /* Form Enhancements */
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .form-control:focus {
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
        }

        .input-group-text {
            border: 2px solid #e2e8f0;
            border-right: none;
            border-radius: 8px 0 0 8px;
            transition: var(--transition);
        }

        .input-group .form-control {
            border-left: none;
            border-right: none;
            border-radius: 0;
        }

        .input-group .form-control:last-child {
            border-right: 2px solid #e2e8f0;
            border-radius: 0 8px 8px 0;
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--blue-primary);
        }

        .input-group:focus-within .input-group-text:last-child {
            border-color: var(--blue-primary);
        }

        /* Navigation Tabs */
        .nav-borders .nav-link {
            border: none;
            border-radius: 8px;
            margin-right: 0.5rem;
            padding: 0.75rem 1.5rem;
            color: #6b7280;
            background: transparent;
            transition: var(--transition);
            font-weight: 500;
        }

        .nav-borders .nav-link:hover {
            background: var(--blue-extra-light);
            color: var(--blue-primary);
        }

        .nav-borders .nav-link.active {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
            color: white;
            box-shadow: var(--shadow-medium);
        }

        /* Password Strength Indicator */
        .password-strength {
            padding: 1rem;
            background: var(--blue-extra-light);
            border-radius: 8px;
            border: 1px solid var(--blue-light);
        }

        .progress {
            border-radius: 4px;
            background-color: #e5e7eb;
        }

        .progress-bar {
            border-radius: 4px;
            transition: var(--transition);
        }

        .strength-weak {
            background-color: #dc2626;
        }

        .strength-fair {
            background-color: #f59e0b;
        }

        .strength-good {
            background-color: #3b82f6;
        }

        .strength-strong {
            background-color: var(--green-primary);
        }

        /* Text Colors */
        .text-blue {
            color: var(--blue-primary) !important;
        }

        .text-green {
            color: var(--green-primary) !important;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        /* Loading States */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Enhanced Focus States */
        .btn:focus,
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .card-header, .card-footer {
                padding: 1rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .avatar {
                width: 2rem;
                height: 2rem;
            }

            .avatar .icon {
                width: 16px;
                height: 16px;
            }

            .nav-borders .nav-link {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }
        }

        /* Animation for Loading */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Eye icon animation */
        @keyframes eyeBlink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .eye-icon:hover {
            animation: eyeBlink 0.3s ease-in-out;
        }

        /* Security tips styling */
        .list-unstyled li {
            display: flex;
            align-items: center;
        }

        /* Enhanced hover effects */
        .card-body:hover .avatar {
            transform: scale(1.02);
        }

        /* Input group hover effects */
        .input-group:hover .input-group-text {
            background-color: var(--blue-extra-light);
        }

        /* Button loading state */
        .btn[disabled] {
            opacity: 0.7;
            transform: none;
            cursor: not-allowed;
        }

        /* Form validation colors */
        .is-valid {
            border-color: var(--green-primary) !important;
        }

        .is-invalid {
            border-color: #dc2626 !important;
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 0.875rem;
        }

        .valid-feedback {
            color: var(--green-primary);
            font-size: 0.875rem;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            // Password utilities
            const PasswordUtils = {
                // Toggle password visibility
                toggleVisibility(target) {
                    const input = document.querySelector(`[data-password-toggle="${target}"]`);
                    const button = document.querySelector(`[data-toggle-target="${target}"]`);
                    const icon = button.querySelector('.eye-icon');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.innerHTML = `
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="3" y1="3" x2="21" y2="21"></line>
                            <path d="M10.584 10.587a2 2 0 0 0 2.828 2.83"></path>
                            <path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2 10 6c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631.593 -3.423 .651 -5.357 -.247c-4 -1.333 -7.333 -4.667 -10 -10c.939 -1.625 2.055 -2.969 3.347 -4.031"></path>
                        `;
                    } else {
                        input.type = 'password';
                        icon.innerHTML = `
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="2"></circle>
                            <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"></path>
                        `;
                    }
                },

                // Check password strength
                checkStrength(password) {
                    let score = 0;
                    let feedback = [];

                    if (password.length >= 8) score += 1;
                    else feedback.push('Minimal 8 karakter');

                    if (/[a-z]/.test(password)) score += 1;
                    else feedback.push('Huruf kecil');

                    if (/[A-Z]/.test(password)) score += 1;
                    else feedback.push('Huruf besar');

                    if (/\d/.test(password)) score += 1;
                    else feedback.push('Angka');

                    if (/[^A-Za-z0-9]/.test(password)) score += 1;
                    else feedback.push('Karakter khusus');

                    return { score, feedback };
                },

                // Update strength indicator
                updateStrengthIndicator(password) {
                    const strengthDiv = document.getElementById('passwordStrength');
                    const strengthBar = document.getElementById('strengthBar');
                    const strengthText = document.getElementById('strengthText');

                    if (password.length === 0) {
                        strengthDiv.classList.add('d-none');
                        return;
                    }

                    strengthDiv.classList.remove('d-none');
                    const { score } = this.checkStrength(password);

                    const levels = [
                        { text: 'Sangat Lemah', class: 'strength-weak', width: 20 },
                        { text: 'Lemah', class: 'strength-weak', width: 40 },
                        { text: 'Cukup', class: 'strength-fair', width: 60 },
                        { text: 'Baik', class: 'strength-good', width: 80 },
                        { text: 'Kuat', class: 'strength-strong', width: 100 }
                    ];

                    const level = levels[score] || levels[0];
                    strengthText.textContent = level.text;
                    strengthBar.style.width = level.width + '%';
                    strengthBar.className = `progress-bar ${level.class}`;
                },

                // Validate password confirmation
                validateConfirmation() {
                    const password = document.getElementById('newPassword').value;
                    const confirm = document.getElementById('confirmPassword');
                    const submitBtn = document.getElementById('submitPasswordBtn');

                    if (confirm.value.length > 0) {
                        if (password === confirm.value) {
                            confirm.classList.remove('is-invalid');
                            confirm.classList.add('is-valid');
                            submitBtn.disabled = false;
                        } else {
                            confirm.classList.remove('is-valid');
                            confirm.classList.add('is-invalid');
                            submitBtn.disabled = true;
                        }
                    } else {
                        confirm.classList.remove('is-valid', 'is-invalid');
                        submitBtn.disabled = false;
                    }
                }
            };

            // Password toggle buttons event handlers
            $('[data-toggle-target]').on('click', function() {
                const target = $(this).data('toggle-target');
                PasswordUtils.toggleVisibility(target);
            });

            // Password strength checking
            $('#newPassword').on('input', function() {
                const password = this.value;
                PasswordUtils.updateStrengthIndicator(password);
                PasswordUtils.validateConfirmation();
            });

            // Password confirmation validation
            $('#confirmPassword').on('input', function() {
                PasswordUtils.validateConfirmation();
            });

            // Form submission with loading state
            $('#passwordForm').on('submit', function() {
                const submitBtn = $('#submitPasswordBtn');
                const originalText = submitBtn.html();
                
                submitBtn.prop('disabled', true).html(`
                    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                    Menyimpan...
                `);

                // Reset after 10 seconds as fallback
                setTimeout(() => {
                    submitBtn.prop('disabled', false);
                    submitBtn.html(originalText);
                }, 10000);
            });

            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert-dismissible').fadeOut('slow');
            }, 5000);

            // Add fade-in animation to cards
            $('.card').addClass('fade-in');

            // Enhanced form validation feedback
            $('.form-control').on('blur', function() {
                const $this = $(this);
                const $inputGroup = $this.closest('.input-group');
                
                if ($this.val().trim() !== '' && !$this.hasClass('is-invalid')) {
                    $this.addClass('is-valid');
                    $inputGroup.find('.input-group-text').addClass('border-success');
                } else if ($this.val().trim() === '' && $this.prop('required')) {
                    $this.removeClass('is-valid');
                    $inputGroup.find('.input-group-text').removeClass('border-success');
                }
            });

            // Remove validation classes on input
            $('.form-control').on('input', function() {
                $(this).removeClass('is-valid is-invalid');
                $(this).closest('.input-group').find('.input-group-text').removeClass('border-success border-danger');
            });

            // Enhance input group focus effects
            $('.form-control').on('focus', function() {
                $(this).closest('.input-group').find('.input-group-text').addClass('border-primary');
            });

            $('.form-control').on('blur', function() {
                $(this).closest('.input-group').find('.input-group-text').removeClass('border-primary');
            });

            // Add smooth scrolling to top when form is submitted
            $('#passwordForm').on('submit', function() {
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
        });
    </script>
@endpush