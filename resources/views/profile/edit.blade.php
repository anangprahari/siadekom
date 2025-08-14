@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <i class="fas fa-user-circle me-2"></i>
                        Profil Saya
                    </h2>
                    <div class="page-pretitle">Kelola informasi profil dan akun Anda</div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <!-- Profile Summary -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="avatar avatar-xl mx-auto mb-3">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-secondary">{{ '@' . $user->username }}</p>
                            <p class="text-muted small">{{ $user->email }}</p>

                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-1"></i>
                                Bergabung {{ $user->created_at->format('M Y') }}
                            </small>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="card mt-3">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action active">
                                <i class="fas fa-user me-2"></i>
                                Informasi Profil
                            </a>
                            <a href="{{ route('profile.settings') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-cog me-2"></i>
                                Pengaturan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Edit Form -->
                <div class="col-md-8">
                    <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                        @csrf
                        @method('patch')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Informasi Profil</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username', $user->username) }}" required>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        Terakhir diupdate: {{ $user->updated_at->format('d M Y H:i') }}
                                    </small>
                                    <div>
                                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">Batal</a>
                                        <button type="submit" class="btn btn-primary" id="submitBtn">
                                            <i class="fas fa-save me-1"></i>
                                            Perbarui Profil
                                        </button>
                                    </div>
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
        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }

        .list-group-item-action.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        // Form submission
        $('#profileForm').on('submit', function() {
            const submitBtn = $('#submitBtn');
            submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Menyimpan...');
        });

        // Show messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}'
            });
        @endif
    </script>
@endpush
