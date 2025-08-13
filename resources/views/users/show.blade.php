@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail User</li>
                        </ol>
                    </nav>
                    <div class="page-pretitle">
                        Detail Informasi
                    </div>
                    <h2 class="page-title">
                        <i class="fas fa-user me-2"></i>
                        {{ $user->name }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali
                        </a>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i>
                            Edit User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <!-- Profile Card -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <div class="avatar avatar-xl mx-auto">
                                    <div class="avatar-placeholder">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                </div>
                            </div>

                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-secondary mb-3">{{ '@' . $user->username }}</p>

                            <!-- HAPUS: Badge email verification status -->

                            <div class="row g-2">
                                <div class="col-6">
                                    <button class="btn btn-outline-primary w-100"
                                        onclick="sendEmail('{{ $user->email }}')">
                                        <i class="fas fa-envelope me-1"></i>
                                        Email
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-danger w-100"
                                        onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                        <i class="fas fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line me-2"></i>
                                Statistik Cepat
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="h1 mb-1 text-primary">
                                            {{ $user->created_at->diffInDays(now()) }}
                                        </div>
                                        <div class="text-secondary small">
                                            Hari Bergabung
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <div class="h1 mb-1 text-success">
                                            {{ $user->updated_at->diffInDays($user->created_at) }}
                                        </div>
                                        <div class="text-secondary small">
                                            Hari Update Terakhir
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details Card -->
                <div class="col-lg-8">
                    <div class="row row-cards">
                        <!-- User Information -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Informasi User
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-secondary fw-medium">Nama Lengkap</label>
                                                <div class="form-control-plaintext fw-bold">
                                                    <i class="fas fa-user me-2 text-primary"></i>
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-secondary fw-medium">Username</label>
                                                <div class="form-control-plaintext fw-bold">
                                                    <i class="fas fa-at me-2 text-primary"></i>
                                                    {{ $user->username }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label text-secondary fw-medium">Alamat Email</label>
                                                <div class="form-control-plaintext fw-bold">
                                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                                    <a href="mailto:{{ $user->email }}" class="text-decoration-none">
                                                        {{ $user->email }}
                                                    </a>
                                                    <!-- HAPUS: Badge email verification status -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cog me-2"></i>
                                        Informasi Akun
                                    </h3>
                                    <div class="card-actions">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#passwordModal">
                                            <i class="fas fa-key me-1"></i>
                                            Ubah Password
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-secondary fw-medium">Tanggal Dibuat</label>
                                                <div class="form-control-plaintext">
                                                    <i class="fas fa-calendar-plus me-2 text-success"></i>
                                                    <span class="fw-bold">{{ $user->created_at->format('d F Y') }}</span>
                                                    <br>
                                                    <small class="text-secondary">
                                                        {{ $user->created_at->format('H:i') }} WIB
                                                        ({{ $user->created_at->diffForHumans() }})
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-secondary fw-medium">Terakhir
                                                    Diupdate</label>
                                                <div class="form-control-plaintext">
                                                    <i class="fas fa-calendar-check me-2 text-warning"></i>
                                                    <span class="fw-bold">{{ $user->updated_at->format('d F Y') }}</span>
                                                    <br>
                                                    <small class="text-secondary">
                                                        {{ $user->updated_at->format('H:i') }} WIB
                                                        ({{ $user->updated_at->diffForHumans() }})
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HAPUS: Email verification date section -->
                                    </div>
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
                            <div class="form-text">Minimal 6 karakter</div>
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
                        <button type="submit" class="btn btn-primary" id="updatePasswordBtn">
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

        .avatar-img {
            border: 3px solid #fff;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, .1);
        }

        .form-control-plaintext {
            display: flex;
            align-items: center;
            min-height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0;
            margin-bottom: 0;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: transparent;
            border: solid transparent;
            border-width: 1px 0;
        }

        .card-body .row .col-md-6:last-child .mb-3:last-child,
        .card-body .row .col-12:last-child .mb-3:last-child {
            margin-bottom: 0 !important;
        }

        .text-decoration-none:hover {
            text-decoration: underline !important;
        }

        .badge {
            font-size: 0.75em;
            vertical-align: middle;
        }

        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }

        /* Fix modal z-index issues */
        #passwordModal {
            z-index: 1060 !important;
        }

        #passwordModal .modal-backdrop {
            z-index: 1055 !important;
        }

        .modal-backdrop.show {
            z-index: 1055 !important;
        }

        /* Ensure modal appears above navbar */
        .navbar {
            z-index: 1030 !important;
        }

        .user-dropdown .dropdown-menu {
            z-index: 1040 !important;
        }

        /* Modal improvements */
        .modal-dialog {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .modal-content {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: none;
            border-radius: 0.5rem;
        }

        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 0.5rem 0.5rem 0 0;
            border-bottom: none;
        }

        .modal-header .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        /* Debug styles untuk foto - hapus setelah testing */
        .debug-photo {
            font-size: 0.7rem;
            color: #999;
            margin-top: 5px;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            console.log('Show user page loaded');

            // Debug: Check image path
            $('.avatar-img').each(function() {
                console.log('Profile image src:', $(this).attr('src'));
            });

            // Close navbar dropdowns before showing modal
            $('[data-bs-toggle="modal"]').on('click', function() {
                // Close any open user dropdowns
                $('.user-dropdown').removeClass('show');

                // Close any sidebar dropdowns
                if (typeof closeAllDropdowns === 'function') {
                    closeAllDropdowns();
                }

                // Small delay to ensure dropdowns are closed
                setTimeout(function() {
                    const modalId = $(this).attr('data-bs-target');
                    if (modalId) {
                        $(modalId).modal('show');
                    }
                }.bind(this), 100);

                return false; // Prevent default behavior
            });

            // Enhanced modal show event
            $('#passwordModal').on('show.bs.modal', function(e) {
                console.log('Password modal is showing');

                // Ensure proper z-index
                $(this).css('z-index', 1060);

                // Close any dropdowns
                $('.user-dropdown').removeClass('show');

                // Focus first input after modal is shown
                setTimeout(() => {
                    $('#newPassword').focus();
                }, 300);
            });

            $('#passwordModal').on('shown.bs.modal', function(e) {
                console.log('Password modal shown');

                // Double-check z-index
                $(this).css('z-index', 1060);
                $('.modal-backdrop').css('z-index', 1055);
            });

            // Toggle password visibility in modal
            $('#toggleNewPassword').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

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

            $('#toggleConfirmPassword').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

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

            // Prevent event bubbling on modal clicks
            $('#passwordModal').on('click', function(e) {
                e.stopPropagation();
            });

            // Handle escape key for modal
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape' && $('#passwordModal').hasClass('show')) {
                    $('#passwordModal').modal('hide');
                }
            });
        });

        // Send email function
        function sendEmail(email) {
            window.location.href = `mailto:${email}`;
        }

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
    </script>
@endpush
