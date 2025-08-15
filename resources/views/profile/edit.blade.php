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
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="page-title mb-0">Profil Saya</h2>
                            <div class="text-muted mt-1">Kelola informasi profil dan akun Anda</div>
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
                    <a class="nav-link active fw-bold" href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                        Profil
                    </a>
                    <a class="nav-link fw-bold" href="{{ route('profile.settings') }}">
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
            <!-- Profile Summary -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Info Profil</h3>
                                <div class="text-muted small">Detail akun Anda</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl mx-auto mb-3 bg-blue-lt text-blue">
                            <span class="fw-bold">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                        </div>
                        <h3 class="mb-1 text-blue fw-bold">{{ $user->name }}</h3>
                        <p class="text-muted mb-2">
                            <span class="text-blue fw-medium">@</span>
                            <span class="detail-value ms-1">{{ $user->username }}</span>
                        </p>
                        <p class="text-muted small mb-3">{{ $user->email }}</p>

                        <div class="row text-center">
                            <div class="col">
                                <div class="badge bg-blue-lt text-blue fw-bold px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16"
                                        height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                        <line x1="16" y1="3" x2="16" y2="7"></line>
                                        <line x1="8" y1="3" x2="8" y2="7"></line>
                                        <line x1="4" y1="11" x2="20" y2="11"></line>
                                    </svg>
                                    Bergabung {{ $user->created_at->format('M Y') }}
                                </div>
                            </div>
                        </div>

                        <small class="text-muted d-block mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="14" height="14"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12,6 12,12 16,14"></polyline>
                            </svg>
                            Terakhir diupdate: {{ $user->updated_at->format('d M Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Edit Informasi Profil</h3>
                                <div class="text-muted small">Perbarui data pribadi Anda</div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                        @csrf
                        @method('patch')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-blue required">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $user->name) }}" required
                                            placeholder="Masukkan nama lengkap">
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-blue required">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 12c2.21 0 4 -1.79 4 -4s-1.79 -4 -4 -4s-4 1.79 -4 4s1.79 4 4 4z"></path>
                                                <path d="M12 14c-5.33 0 -8 2.67 -8 4v2h16v-2c0 -1.33 -2.67 -4 -8 -4z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username', $user->username) }}" required
                                            placeholder="Masukkan username">
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label fw-bold text-blue required">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                                <polyline points="3,7 12,13 21,7"></polyline>
                                            </svg>
                                        </span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $user->email) }}" required
                                            placeholder="Masukkan email">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-blue-lt border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-blue" width="18"
                                        height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12,6 12,12 16,14"></polyline>
                                    </svg>
                                    <span class="fw-medium">
                                        Terakhir diupdate: <span class="text-blue fw-bold">{{ $user->updated_at->format('d M Y H:i') }}</span>
                                    </span>
                                </div>
                                <div class="btn-list">
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18"
                                            height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M11 7l-5 5l5 5"></path>
                                            <path d="M17 7l-5 5l5 5"></path>
                                        </svg>
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-blue" id="submitBtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18"
                                            height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                            <circle cx="12" cy="14" r="2"></circle>
                                            <polyline points="14,4 14,8 8,8 8,4"></polyline>
                                        </svg>
                                        Perbarui Profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-styles')
    <style>
        /* Blue Light Theme Styling - Same as reference */
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
            border-left-color: #16a34a;
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
            border-radius: 0 8px 8px 0;
        }

        .input-group:focus-within .input-group-text {
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

        /* Detail Value Styling */
        .detail-value {
            font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
            font-size: 0.8125rem;
            background: #f8fafc;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            color: #475569;
        }

        /* Text Colors */
        .text-blue {
            color: var(--blue-primary) !important;
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

            .avatar span {
                font-size: 0.75rem;
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
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            // Form submission with loading state
            $('#profileForm').on('submit', function() {
                const submitBtn = $('#submitBtn');
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
        });
    </script>
@endpush