@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Detail User</li>
                        </ol>
                    </nav>
                    <h2 class="page-title">
                        <i class="fas fa-user me-2"></i>
                        {{ $user->name }}
                    </h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <!-- Profile Card -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="avatar avatar-xl mx-auto mb-3">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-secondary mb-3">{{ '@' . $user->username }}</p>

                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="mailto:{{ $user->email }}" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-envelope me-1"></i>
                                        Email
                                    </a>
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
                </div>

                <!-- Details Card -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi User</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-secondary">Nama Lengkap</label>
                                    <div class="fw-bold">{{ $user->name }}</div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-secondary">Username</label>
                                    <div class="fw-bold">{{ $user->username }}</div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label text-secondary">Email</label>
                                    <div class="fw-bold">
                                        <a href="mailto:{{ $user->email }}"
                                            class="text-decoration-none">{{ $user->email }}</a>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-secondary">Tanggal Dibuat</label>
                                    <div class="fw-bold">
                                        {{ $user->created_at->format('d F Y') }}
                                        <small class="text-secondary d-block">{{ $user->created_at->format('H:i') }} WIB
                                            ({{ $user->created_at->diffForHumans() }})</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-secondary">Terakhir Diupdate</label>
                                    <div class="fw-bold">
                                        {{ $user->updated_at->format('d F Y') }}
                                        <small class="text-secondary d-block">{{ $user->updated_at->format('H:i') }} WIB
                                            ({{ $user->updated_at->diffForHumans() }})</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('page-scripts')
    <script>
        // Delete confirmation
        function confirmDelete(userId, userName) {
            Swal.fire({
                title: 'Hapus User?',
                html: `Apakah Anda yakin ingin menghapus user <strong>${userName}</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm');
                    form.action = `/users/${userId}`;
                    form.submit();
                }
            });
        }

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
