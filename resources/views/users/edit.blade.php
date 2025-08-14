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
                    <div class="page-pretitle">Edit User</div>
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
                                        <label class="form-label required">Nama Lengkap</label>
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
                                        <label class="form-label required">Username</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                id="username" value="{{ old('username', $user->username) }}"
                                                placeholder="Masukkan username" data-validation="username" required>
                                        </div>
                                        <div class="form-text">Username hanya boleh mengandung huruf, angka, dan underscore.
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label required">Alamat Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email', $user->email) }}"
                                                placeholder="Masukkan alamat email" required>
                                        </div>
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
                                        onclick="UserActions.confirmDelete({{ $user->id }}, '{{ $user->name }}')">
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
    <div class="modal fade" id="passwordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.updatePassword', $user->username) }}" method="POST" id="passwordForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-key me-2"></i>
                            Ubah Password - {{ $user->name }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                <input type="password" class="form-control" name="password" id="newPassword"
                                    data-password-toggle="new" required>
                                <button type="button" class="btn btn-outline-secondary" data-toggle-target="new">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">Minimal 8 karakter dengan kombinasi huruf dan angka.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="confirmNewPassword" data-password-toggle="confirm" required>
                                <button type="button" class="btn btn-outline-secondary" data-toggle-target="confirm">
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
        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }

        .card-footer.bg-transparent {
            background-color: #f8f9fa !important;
            border-top: 1px solid #dee2e6;
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
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            // Username validation
            $('[data-validation="username"]').on('input', function() {
                FormUtils.validateUsername(this);
            });

            // Password toggle functionality
            $('[data-toggle-target]').on('click', function(e) {
                e.preventDefault();
                const target = $(this).data('toggle-target');
                PasswordUtils.toggleVisibility(target);
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
                FormUtils.handleFormSubmit(this, document.getElementById('submitBtn'));

                setTimeout(() => {
                    this.submit();
                }, 500);
            });

            // Password form submission
            $('#passwordForm').on('submit', function(e) {
                e.preventDefault();
                FormUtils.handleFormSubmit(this, document.getElementById('updatePasswordBtn'));

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

        // Show messages
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
