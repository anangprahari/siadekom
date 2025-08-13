@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                    <div class="page-pretitle">
                        Edit User
                    </div>
                    <h2 class="page-title">
                        <i class="fas fa-user-edit me-2"></i>
                        {{ $user->name }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.show', $user) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali
                        </a>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list me-1"></i>
                            Daftar Users
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
                    <form action="{{ route('users.update', $user) }}" method="POST" id="editUserForm">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user me-2"></i>
                                    Edit Informasi User
                                </h3>
                                <div class="card-actions">
                                    <div class="text-secondary">
                                        <small>
                                            <i class="fas fa-clock me-1"></i>
                                            Dibuat: {{ $user->created_at->format('d M Y H:i') }}
                                        </small>
                                    </div>
                                </div>
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
                                                name="name" id="name" value="{{ old('name', $user->name) }}"
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
                                                id="username" value="{{ old('username', $user->username) }}"
                                                placeholder="Masukkan username" required>
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
                                            <!-- HAPUS semua badge dan status verifikasi email -->
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email', $user->email) }}"
                                                placeholder="Masukkan alamat email" required>
                                        </div>
                                        <!-- HAPUS semua pesan terkait verifikasi email -->
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="card-footer bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="text-secondary">
                                            <small>
                                                <i class="fas fa-info-circle me-1"></i>
                                                Terakhir diupdate: {{ $user->updated_at->format('d M Y H:i') }}
                                                ({{ $user->updated_at->diffForHumans() }})
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="btn-list">
                                            <a href="{{ route('users.show', $user) }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-times me-1"></i>
                                                Batal
                                            </a>
                                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                                <i class="fas fa-save me-1"></i>
                                                Update User
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Quick Actions Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-tools me-2"></i>
                                Aksi Cepat
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-warning w-100" data-bs-toggle="modal"
                                        data-bs-target="#passwordModal">
                                        <i class="fas fa-key me-2"></i>
                                        Ubah Password
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-outline-danger w-100"
                                        onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                        <i class="fas fa-trash me-2"></i>
                                        Hapus User
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.updatePassword', $user->username) }}" method="POST" id="passwordForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordModalLabel">
                            <i class="fas fa-key me-2"></i>
                            Ubah Password - {{ $user->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Perhatian:</strong> Setelah password diubah, user harus login ulang dengan password
                            baru.
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" id="newPassword" required>
                                <button type="button" class="btn btn-outline-secondary" id="toggleNewPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">Minimal 6 karakter dengan kombinasi huruf dan angka.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="confirmNewPassword" required>
                                <button type="button" class="btn btn-outline-secondary" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>
                            Batal
                        </button>
                        <button type="submit" class="btn btn-warning" id="updatePasswordBtn">
                            <i class="fas fa-save me-1"></i>
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Hidden form for delete -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
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

        .card-footer.bg-transparent {
            background-color: #f8f9fa !important;
            border-top: 1px solid #dee2e6;
        }

        .badge {
            font-size: 0.75em;
            vertical-align: middle;
        }

        #currentPhoto.photo-will-remove {
            opacity: 0.3;
            filter: grayscale(100%);
        }

        .removed-photo-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #dc3545;
            font-size: 1.5rem;
            z-index: 1;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            console.log('Edit user page loaded');
            // Username validation
            $('#username').on('input', function() {
                let username = $(this).val();
                let sanitized = username.replace(/[^a-zA-Z0-9_]/g, '');

                if (username !== sanitized) {
                    $(this).val(sanitized);
                }
            });

            // HAPUS: Email change warning - tidak diperlukan lagi

            // Toggle password visibility in modal
            $('#toggleNewPassword').on('click', function() {
                const passwordInput = $('#newPassword');
                const icon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            $('#toggleConfirmPassword').on('click', function() {
                const passwordInput = $('#confirmNewPassword');
                const icon = $(this).find('i');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Password confirmation validation
            $('#confirmNewPassword').on('input', function() {
                const password = $('#newPassword').val();
                const confirmPassword = $(this).val();
                const submitBtn = $('#updatePasswordBtn');

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

            // Main form submission
            $('#editUserForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#submitBtn');
                const originalText = submitBtn.html();

                // Show loading
                submitBtn.prop('disabled', true)
                    .html('<i class="fas fa-spinner fa-spin me-1"></i>Mengupdate...');

                // Submit form
                setTimeout(() => {
                    this.submit();
                }, 500);
            });

            // Password form submission
            $('#passwordForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#updatePasswordBtn');
                const originalText = submitBtn.html();

                // Show loading
                submitBtn.prop('disabled', true)
                    .html('<i class="fas fa-spinner fa-spin me-1"></i>Mengupdate...');

                // Submit form
                setTimeout(() => {
                    this.submit();
                }, 500);
            });

            // Reset modal when closed
            $('#passwordModal').on('hidden.bs.modal', function() {
                $('#passwordForm')[0].reset();
                $('#newPassword, #confirmNewPassword').removeClass('is-valid is-invalid');
                $('#updatePasswordBtn').prop('disabled', false)
                    .html('<i class="fas fa-save me-1"></i>Update Password');
            });
        });

        // Delete confirmation function
        function confirmDelete(userId, userName) {
            Swal.fire({
                title: 'Hapus User?',
                html: `Apakah Anda yakin ingin menghapus user <strong>${userName}</strong>?<br><small class="text-danger">Tindakan ini tidak dapat dibatalkan!</small>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash me-1"></i>Ya, Hapus!',
                cancelButtonText: '<i class="fas fa-times me-1"></i>Batal',
                reverseButtons: true,
                focusConfirm: false,
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Sedang menghapus user, mohon tunggu.',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit delete form
                    const form = document.getElementById('deleteForm');
                    form.action = `/users/${userId}`;
                    form.submit();
                }
            });
        }

        // Show success message if exists
        @if (session('success'))
            $(document).ready(function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            });
        @endif

        // Show error message if exists  
        @if (session('error'))
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            });
        @endif

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
