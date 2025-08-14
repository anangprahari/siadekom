@extends('layouts.tabler')

@section('content')
    <div class="container-xl px-4 mt-4">
        <x-alert />

        <!-- Navigation Tabs -->
        <nav class="nav nav-borders">
            <a class="nav-link ms-0" href="{{ route('profile.edit') }}">Profil</a>
            <a class="nav-link active" href="{{ route('profile.settings') }}">Pengaturan</a>
        </nav>
        <hr class="mt-0 mb-4" />

        <div class="row">
            <!-- Change Password -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-key me-2"></i>
                            Ubah Password
                        </h3>
                    </div>
                    <form action="{{ route('password.update') }}" method="POST" id="passwordForm">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Current Password -->
                                <div class="col-12 mb-3">
                                    <label class="form-label required">Password Saat Ini</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" data-password-toggle="current" required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-toggle-target="current">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('current_password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- New Password -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Password Baru</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="newPassword" data-password-toggle="new" required>
                                        <button type="button" class="btn btn-outline-secondary" data-toggle-target="new">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="form-text">Minimal 8 karakter</div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label required">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="confirmPassword" data-password-toggle="confirm"
                                            required>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-toggle-target="confirm">
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
                            <button type="submit" class="btn btn-primary" id="submitPasswordBtn">
                                <i class="fas fa-save me-1"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="col-lg-4">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Zona Berbahaya
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-danger">Hapus Akun</h5>
                        <p class="card-text">
                            Menghapus akun Anda adalah tindakan permanen dan tidak dapat dibatalkan.
                            Semua data Anda akan dihapus secara permanen.
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteAccountModal">
                            <i class="fas fa-trash me-1"></i>
                            Hapus Akun Saya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Konfirmasi Hapus Akun
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <strong>Peringatan!</strong> Tindakan ini tidak dapat dibatalkan.
                        </div>
                        <p>Untuk mengonfirmasi penghapusan akun, masukkan password Anda:</p>
                        <div class="mb-3">
                            <label class="form-label required">Password Anda</label>
                            <input type="password" class="form-control @error('userDeletion.password') is-invalid @enderror"
                                name="password" required>
                            @error('userDeletion.password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <p class="text-muted">Dengan menghapus akun, semua data berikut akan dihapus:</p>
                        <ul class="text-muted">
                            <li>Informasi profil</li>
                            <li>Riwayat aktivitas</li>
                            <li>Pengaturan personal</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i>
                            Ya, Hapus Akun Saya
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('page-styles')
    <style>
        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        // Password utilities
        const PasswordUtils = {
            // Toggle password visibility
            toggleVisibility(target) {
                const input = document.querySelector(`[data-password-toggle="${target}"]`);
                const button = document.querySelector(`[data-toggle-target="${target}"]`);
                const icon = button.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
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

        $(document).ready(function() {
            // Password toggle buttons
            $('[data-toggle-target]').on('click', function() {
                const target = $(this).data('toggle-target');
                PasswordUtils.toggleVisibility(target);
            });

            // Password confirmation validation
            $('#confirmPassword').on('input', PasswordUtils.validateConfirmation);

            // Form submission
            $('#passwordForm').on('submit', function(e) {
                FormUtils.handleFormSubmit(this, document.getElementById('submitPasswordBtn'));
            });
        });

        // Show messages using FormUtils from profile edit
        @if (session('success'))
            FormUtils.showNotification('success', 'Berhasil!', '{{ session('success') }}');
        @endif

        @if (session('error'))
            FormUtils.showNotification('error', 'Error!', '{{ session('error') }}', {
                showConfirmButton: true,
                toast: false,
                position: 'center',
                timer: false
            });
        @endif
    </script>
@endpush
