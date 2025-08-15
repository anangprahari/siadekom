@extends('layouts.tabler')

@section('content')
    <div class="container-fluid p-1">
        <!-- Ganti bagian page-header dengan code ini -->
        <div class="page-header d-print-none mb-1">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="avatar avatar-lg bg-blue-lt">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h2 class="page-title mb-0">Tambah User Baru</h2>
                                    <div class="text-muted mt-1">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1 text-blue"
                                                width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            Buat akun pengguna baru untuk sistem
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <div class="btn-list">
                                <a href="{{ route('users.index') }}" class="btn btn-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M13 18l6 -6"></path>
                                        <path d="M13 6l6 6"></path>
                                    </svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
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

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('users.store') }}" method="POST" id="createUserForm">
                    @csrf
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
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="card-title mb-0 text-blue">Formulir User Baru</h3>
                                    <div class="text-muted small">Lengkapi semua informasi yang diperlukan</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
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
                                            name="name" value="{{ old('name') }}"
                                            placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-blue required">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">@</span>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" placeholder="Masukkan username"
                                            required>
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="14"
                                            height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                        Hanya huruf, angka, dan underscore
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold text-blue required">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                                <path d="m22 7-10 5L2 7"></path>
                                            </svg>
                                        </span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                                            required>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-blue required">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect width="18" height="11" x="3" y="11" rx="2"
                                                    ry="2"></rect>
                                                <path d="m7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Masukkan password" required>
                                        <button type="button" class="btn btn-outline-blue"
                                            onclick="togglePassword('password')" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" id="password-icon">
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="14"
                                            height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                        Minimal 8 karakter
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-blue required">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="Ulangi password" required>
                                        <button type="button" class="btn btn-outline-blue"
                                            onclick="togglePassword('password_confirmation')" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" id="password_confirmation-icon">
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16"
                                                height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-blue-lt border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-blue" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                                    <span class="fw-medium">Pastikan semua data yang dimasukkan sudah benar</span>
                                </div>
                                <div class="btn-list">
                                    <a href="{{ route('users.index') }}" class="btn btn-blue">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 14l-4 -4l4 -4"></path>
                                            <path d="M5 10h11a4 4 0 1 1 0 8h-1"></path>
                                        </svg>
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-blue" id="submitBtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        Simpan User Baru
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            window.togglePassword = function(fieldId) {
                const field = document.getElementById(fieldId);
                const icon = document.getElementById(fieldId + '-icon');

                if (field.type === 'password') {
                    field.type = 'text';
                    icon.innerHTML = `
                        <path d="m15 18-.722-3.25"></path>
                        <path d="M2 8a10.645 10.645 0 0 0 20 0"></path>
                        <path d="m20 15-1.726-2.05"></path>
                        <path d="m4 15 1.726-2.05"></path>
                        <path d="m9 13.75 1.5-1.5"></path>
                        <path d="m14.5 12.25 1.5 1.5"></path>
                    `;
                } else {
                    field.type = 'password';
                    icon.innerHTML = `
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6"></path>
                    `;
                }
            };

            // Auto generate username from name
            $('input[name="name"]').on('input', function() {
                const usernameField = $('input[name="username"]');
                if (!usernameField.data('manual')) {
                    const username = $(this).val().toLowerCase()
                        .replace(/[^a-zA-Z0-9\s]/g, '')
                        .replace(/\s+/g, '_')
                        .substring(0, 20);
                    usernameField.val(username);
                }
            });

            // Mark username as manually edited
            $('input[name="username"]').on('input', function() {
                $(this).data('manual', true);
            });

            // Form submission with loading state
            $('#createUserForm').on('submit', function() {
                const submitBtn = $('#submitBtn');
                const originalContent = submitBtn.html();

                submitBtn.prop('disabled', true).html(`
                    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                    Menyimpan User...
                `);

                // Reset after 10 seconds as fallback
                setTimeout(() => {
                    submitBtn.prop('disabled', false).html(originalContent);
                }, 10000);
            });

            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert-dismissible').fadeOut('slow');
            }, 5000);

            // Real-time password validation
            $('#password, #password_confirmation').on('input', function() {
                const password = $('#password').val();
                const confirmation = $('#password_confirmation').val();

                if (confirmation && password !== confirmation) {
                    $('#password_confirmation').addClass('is-invalid');
                    if (!$('#password_confirmation').next('.invalid-feedback').length) {
                        $('#password_confirmation').after(`
                            <div class="invalid-feedback">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                Password tidak cocok
                            </div>
                        `);
                    }
                } else {
                    $('#password_confirmation').removeClass('is-invalid');
                    $('#password_confirmation').next('.invalid-feedback:contains("Password tidak cocok")')
                        .remove();
                }
            });

            // Form validation enhancement
            $('input').on('blur', function() {
                if ($(this).prop('required') && !$(this).val().trim()) {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });

            // Enhanced form interactions
            $('.form-control').on('focus', function() {
                $(this).closest('.input-group').addClass('input-group-focus');
            }).on('blur', function() {
                $(this).closest('.input-group').removeClass('input-group-focus');
            });
        });
    </script>
@endpush

@push('page-styles')
    <style>
        /* Blue Light Theme Styling - Consistent with Index & Show */
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

        .form-control.is-invalid {
            border-color: #dc2626;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 38, 38, 0.25);
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

        .input-group .btn {
            border-left: none;
            border-radius: 0 8px 8px 0;
            border: 2px solid #e2e8f0;
            border-left: none;
        }

        .input-group:focus-within .input-group-text,
        .input-group-focus .input-group-text {
            border-color: var(--blue-primary);
        }

        .input-group:focus-within .btn,
        .input-group-focus .btn {
            border-color: var(--blue-primary);
        }

        .input-group-focus {
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.1);
            border-radius: 8px;
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

        /* Required Field Styling */
        .form-label.required::after {
            content: ' *';
            color: #dc2626;
            font-weight: bold;
        }

        /* Text Colors */
        .text-blue {
            color: var(--blue-primary) !important;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        /* Breadcrumb Styling */
        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            font-size: 0.875rem;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: '>';
            color: var(--blue-primary);
            font-weight: bold;
        }

        /* Loading States */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Invalid Feedback Styling */
        .invalid-feedback {
            display: block;
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            padding: 0.5rem;
            background: #fee2e2;
            border-radius: 6px;
            border-left: 3px solid #dc2626;
        }

        /* Form Text Enhancement */
        .form-text {
            font-size: 0.8125rem;
            margin-top: 0.25rem;
            padding: 0.25rem 0.5rem;
            background: var(--blue-extra-light);
            border-radius: 4px;
            border-left: 3px solid var(--blue-light);
        }

        /* Page Header Enhancements */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--blue-dark);
            margin-bottom: 0.5rem;
        }

        .avatar-lg {
            width: 3.5rem;
            height: 3.5rem;
            font-size: 1.25rem;
        }

        /* Enhanced hover effects */
        .input-group:hover .input-group-text {
            background-color: var(--blue-extra-light);
        }

        /* Card body padding consistency */
        .card-body {
            padding: 2rem 1.5rem;
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {

            .card-header,
            .card-footer {
                padding: 1rem;
            }

            .card-body {
                padding: 1.5rem 1rem;
            }

            .btn-list {
                flex-direction: column;
                gap: 0.5rem;
            }

            .btn-list .btn {
                width: 100%;
                justify-content: center;
            }

            .page-header {
                text-align: center;
            }

            .col-auto.ms-auto {
                margin-top: 1rem !important;
                margin-left: 0 !important;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .avatar-lg {
                width: 3rem;
                height: 3rem;
                font-size: 1rem;
            }
        }

        /* Enhanced Focus States */
        .btn:focus,
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
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

        /* Form validation visual feedback */
        .form-control:valid {
            border-color: #16a34a;
        }

        .form-control:valid:focus {
            box-shadow: 0 0 0 0.2rem rgba(22, 163, 74, 0.25);
        }

        /* Enhanced button loading state */
        .btn:disabled {
            opacity: 0.65;
            cursor: not-allowed;
            transform: none;
            box-shadow: var(--shadow-light);
        }

        /* Improved form field spacing */
        .form-label {
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        /* Custom checkbox styling */
        .form-check-input:checked {
            background-color: var(--blue-primary);
            border-color: var(--blue-primary);
        }

        /* Print Styles */
        @media print {
            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .btn {
                display: none !important;
            }
        }

        /* Enhanced input group styling */
        .input-group> :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
            margin-left: -2px;
        }

        /* Improved alert icon alignment */
        .alert .icon {
            flex-shrink: 0;
        }

        /* Better visual feedback for password toggle */
        .input-group .btn:hover {
            background-color: var(--blue-extra-light);
            border-color: var(--blue-primary);
        }

        /* Enhanced card title styling */
        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            line-height: 1.4;
        }

        /* Improved form help text */
        .form-text.text-muted {
            font-size: 0.75rem;
            margin-top: 0.375rem;
        }

        /* Better spacing for form groups */
        .row.g-3>* {
            margin-bottom: 0.75rem;
        }

        /* Enhanced button group spacing */
        .btn-list .btn+.btn {
            margin-left: 0.5rem;
        }

        @media (max-width: 576px) {
            .btn-list .btn+.btn {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }

        .btn-blue {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
            color: white;
        }

        .btn-blue:hover {
            background: linear-gradient(135deg, var(--blue-dark) 0%, var(--blue-primary) 100%);
            color: white;
        }
    </style>
