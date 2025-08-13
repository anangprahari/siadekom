@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                        </ol>
                    </nav>
                    <div class="page-pretitle">
                        Manajemen Users
                    </div>
                    <h2 class="page-title">
                        <i class="fas fa-user-plus me-2"></i>
                        Tambah User Baru
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-8 mx-auto">
                    <form action="{{ route('users.store') }}" method="POST" id="createUserForm">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user me-2"></i>
                                    Informasi User
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">
                                            Nama Lengkap
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" value="{{ old('name') }}"
                                                placeholder="Masukkan nama lengkap" required>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Username -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">
                                            Username
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                id="username" value="{{ old('username') }}" placeholder="Masukkan username"
                                                required>
                                        </div>
                                        <div class="form-text">Username hanya boleh mengandung huruf, angka, dan underscore.
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label required">
                                            Alamat Email
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email') }}"
                                                placeholder="Masukkan alamat email" required>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">
                                            Password
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password" placeholder="Masukkan password" required>
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="form-text">Minimal 8 karakter dengan kombinasi huruf dan angka.</div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">
                                            Konfirmasi Password
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Ulangi password" required>
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="togglePasswordConfirm">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-1"></i>
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="fas fa-save me-1"></i>
                                        Simpan User
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
        .avatar-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            border-radius: 50%;
        }

        .avatar-placeholder:hover {
            border-color: #0d6efd;
            background: linear-gradient(135deg, #0d6efd 0%, #6610f2 100%);
        }

        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-color: #dee2e6;
            color: #6c757d;
        }

        .password-strength {
            margin-top: 0.25rem;
        }

        .password-strength-bar {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
            margin-bottom: 0.25rem;
        }

        .strength-weak {
            background-color: #dc3545;
            width: 33%;
        }

        .strength-medium {
            background-color: #ffc107;
            width: 66%;
        }

        .strength-strong {
            background-color: #198754;
            width: 100%;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            console.log('Create user page loaded');

            // Toggle password visibility
            $('#togglePassword').on('click', function() {
                const passwordInput = $('#password');
                const icon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Toggle confirm password visibility
            $('#togglePasswordConfirm').on('click', function() {
                const passwordInput = $('#password_confirmation');
                const icon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Username validation
            $('#username').on('input', function() {
                let username = $(this).val();
                let sanitized = username.replace(/[^a-zA-Z0-9_]/g, '');

                if (username !== sanitized) {
                    $(this).val(sanitized);
                }
            });

            // Name auto-generate username
            $('#name').on('input', function() {
                const name = $(this).val();
                const usernameField = $('#username');

                if (!usernameField.data('manual-edit')) {
                    let username = name.toLowerCase()
                        .replace(/[^a-zA-Z0-9\s]/g, '')
                        .replace(/\s+/g, '_')
                        .substring(0, 20);
                    usernameField.val(username);
                }
            });

            // Mark username as manually edited
            $('#username').on('keydown', function() {
                $(this).data('manual-edit', true);
            });

            // Password strength indicator
            $('#password').on('input', function() {
                const password = $(this).val();
                let strength = 0;
                let strengthText = '';
                let strengthClass = '';

                // Check length
                if (password.length >= 8) strength++;

                // Check for letters
                if (/[a-zA-Z]/.test(password)) strength++;

                // Check for numbers
                if (/\d/.test(password)) strength++;

                // Check for special characters
                if (/[^a-zA-Z0-9]/.test(password)) strength++;

                // Remove existing strength indicator
                $(this).parent().next('.password-strength').remove();

                if (password.length > 0) {
                    if (strength < 2) {
                        strengthText = 'Lemah';
                        strengthClass = 'strength-weak';
                    } else if (strength < 3) {
                        strengthText = 'Sedang';
                        strengthClass = 'strength-medium';
                    } else {
                        strengthText = 'Kuat';
                        strengthClass = 'strength-strong';
                    }

                    const strengthHtml = `
                <div class="password-strength">
                    <div class="password-strength-bar ${strengthClass}"></div>
                    <small class="text-muted">Kekuatan password: <span class="fw-medium">${strengthText}</span></small>
                </div>
            `;

                    $(this).parent().after(strengthHtml);
                }
            });

            // Password confirmation validation
            $('#password_confirmation').on('input', function() {
                const password = $('#password').val();
                const confirmPassword = $(this).val();
                const submitBtn = $('#submitBtn');

                if (confirmPassword.length > 0) {
                    if (password === confirmPassword) {
                        $(this).removeClass('is-invalid').addClass('is-valid');
                        submitBtn.prop('disabled', false);
                    } else {
                        $(this).removeClass('is-valid').addClass('is-invalid');
                        submitBtn.prop('disabled', true);
                    }
                } else {
                    $(this).removeClass('is-valid is-invalid');
                    submitBtn.prop('disabled', false);
                }
            });

            // Form submission
            $('#createUserForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#submitBtn');
                const originalText = submitBtn.html();

                // Show loading
                submitBtn.prop('disabled', true)
                    .html('<i class="fas fa-spinner fa-spin me-1"></i>Menyimpan...');

                // Simulate form submission delay (remove in production)
                setTimeout(() => {
                    this.submit();
                }, 500);
            });
        });

        // Show validation errors
        @if ($errors->any())
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Terdapat Kesalahan!',
                    html: `
                <div class="text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            `,
                    confirmButtonColor: '#d33'
                });
            });
        @endif
    </script>
@endpush
