@extends('layouts.tabler')

@section('content')
    <div class="container-fluid p-1">
        <div class="page-header d-print-none mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="avatar avatar-lg bg-blue-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="page-title mb-0">{{ $user->name }}</h2>
                            <div class="text-muted mt-1">Informasi detail pengguna sistem</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        @if ($user->id !== Auth::id())
                            <button class="btn btn-outline-red"
                                onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                </svg>
                                Hapus User
                            </button>
                        @endif
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

        <div class="row g-4">
            <!-- Profile Card -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Profil Pengguna</h3>
                                <div class="text-muted small">Informasi identitas user</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="avatar avatar-2xl mx-auto mb-4 bg-blue-lt text-blue">
                            <span class="fw-bold"
                                style="font-size: 2rem;">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                        </div>

                        <h3 class="mb-2 text-blue">{{ $user->name }}</h3>
                        <p class="text-muted mb-4">
                            <span class="text-blue fw-medium">@</span>{{ $user->username }}
                        </p>

                        @if ($user->id === Auth::id())
                            <div class="badge bg-success-lt text-success fw-bold mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1" width="16"
                                    height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                                Akun Anda
                            </div>
                        @endif

                        <div class="row g-2">
                            <div class="col-12 mb-2">
                                <a href="mailto:{{ $user->email }}" class="btn btn-blue w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-10 5L2 7"></path>
                                    </svg>
                                    Kirim Email
                                </a>
                            </div>
                            @if ($user->id !== Auth::id())
                                <div class="col-12">
                                    <button class="btn btn-outline-red w-100"
                                        onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                        Hapus User
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Card -->
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Statistik</h3>
                                <div class="text-muted small">Informasi aktivitas</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div class="avatar avatar-sm bg-green-lt text-green">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Akun Aktif</div>
                                        <small class="text-muted">Status pengguna</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div class="avatar avatar-sm bg-blue-lt text-blue">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                                <path d="m22 7-10 5L2 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Email Terverifikasi</div>
                                        <small class="text-muted">Kontak valid</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Card -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-blue-lt border-0">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div class="avatar avatar-sm bg-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-white" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <path
                                            d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 text-blue">Informasi Detail</h3>
                                <div class="text-muted small">Data lengkap pengguna sistem</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-blue">Nama Lengkap</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-blue-lt text-blue">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="detail-value">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-blue">Username</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-blue-lt text-blue">
                                                <span class="fw-bold">@</span>
                                            </div>
                                        </div>
                                        <div class="detail-value font-mono">{{ $user->username }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-blue">Email Address</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-blue-lt text-blue">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <rect width="20" height="16" x="2" y="4" rx="2">
                                                    </rect>
                                                    <path d="m22 7-10 5L2 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="detail-value">
                                                <a href="mailto:{{ $user->email }}"
                                                    class="text-blue text-decoration-none">{{ $user->email }}</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="mailto:{{ $user->email }}" class="btn btn-ghost-blue btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="16"
                                                    height="16" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 19l7 -7l3 3l-7 7l-3 -3z"></path>
                                                    <path d="M18 13l-1.5 -7.5l-7.5 1.5l3 3l3 3z"></path>
                                                </svg>
                                                Kirim
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-blue">Tanggal Dibuat</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-green-lt text-green">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <rect width="18" height="18" x="3" y="4" rx="2"
                                                        ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6">
                                                    </line>
                                                    <line x1="8" y1="2" x2="8" y2="6">
                                                    </line>
                                                    <line x1="3" y1="10" x2="21" y2="10">
                                                    </line>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="detail-value">{{ $user->created_at->format('d F Y') }}</div>
                                            <small class="text-muted d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1"
                                                    width="14" height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                    <path d="M12 7v5l3 3"></path>
                                                </svg>
                                                {{ $user->created_at->format('H:i') }} WIB
                                                ({{ $user->created_at->diffForHumans() }})
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-blue">Terakhir Diupdate</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-yellow-lt text-yellow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5">
                                                    </line>
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="detail-value">{{ $user->updated_at->format('d F Y') }}</div>
                                            <small class="text-muted d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm me-1"
                                                    width="14" height="14" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                    <path d="M12 7v5l3 3"></path>
                                                </svg>
                                                {{ $user->updated_at->format('H:i') }} WIB
                                                ({{ $user->updated_at->diffForHumans() }})
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-blue">ID Pengguna</label>
                                <div class="detail-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="avatar avatar-sm bg-purple-lt text-purple">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18"
                                                    height="18" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <rect x="4" y="4" width="6" height="6" rx="1">
                                                    </rect>
                                                    <rect x="14" y="4" width="6" height="6" rx="1">
                                                    </rect>
                                                    <rect x="4" y="14" width="6" height="6" rx="1">
                                                    </rect>
                                                    <rect x="14" y="14" width="6" height="6" rx="1">
                                                    </rect>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="detail-value font-mono">
                                            #{{ str_pad($user->id, 2, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                </div>
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
                                <span class="fw-medium">
                                    User terdaftar sejak {{ $user->created_at->format('d M Y') }}
                                </span>
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
        $(document).ready(function() {
            // Delete confirmation with enhanced SweetAlert
            window.confirmDelete = function(userId, userName) {
                Swal.fire({
                    title: '⚠️ Konfirmasi Penghapusan',
                    html: `
                        <div class="text-start">
                            <p class="mb-3">Apakah Anda yakin ingin menghapus user:</p>
                            <div class="alert alert-warning">
                                <strong>${userName}</strong><br>
                                <small class="text-muted">ID: #${userId.toString().padStart(2, '0')}</small>
                            </div>
                            <p class="text-danger mb-0">
                                <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait user ini.
                            </p>
                        </div>
                    `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: '🗑️ Ya, Hapus User!',
                    cancelButtonText: '❌ Batal',
                    customClass: {
                        popup: 'swal2-popup-custom',
                        title: 'swal2-title-custom'
                    },
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            const form = document.getElementById('deleteForm');
                            if (form) {
                                form.action = `/users/${userId}`;
                                form.submit();
                            }
                            resolve();
                        });
                    }
                });
            };

            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert-dismissible').fadeOut('slow');
            }, 5000);

            // Enhanced interactions
            $('.detail-card').hover(
                function() {
                    $(this).addClass('detail-card-hover');
                },
                function() {
                    $(this).removeClass('detail-card-hover');
                }
            );

            // Copy to clipboard functionality for user ID and email
            $('.font-mono, .detail-value a').on('click', function(e) {
                if (e.ctrlKey || e.metaKey) {
                    e.preventDefault();
                    const text = $(this).text().trim();
                    navigator.clipboard.writeText(text).then(() => {
                        // Show toast notification
                        const toast = $(`
                            <div class="toast-container position-fixed top-0 end-0 p-3">
                                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header bg-blue text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        <strong class="me-auto">Berhasil</strong>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                                    </div>
                                    <div class="toast-body">
                                        Text berhasil disalin: <strong>${text}</strong>
                                    </div>
                                </div>
                            </div>
                        `);
                        $('body').append(toast);
                        toast.find('.toast').toast('show');
                        setTimeout(() => toast.remove(), 5000);
                    });
                }
            });

            // Show messages with enhanced styling
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '✅ Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    customClass: {
                        popup: 'swal2-toast-custom'
                    }
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '❌ Error!',
                    text: '{{ session('error') }}',
                    customClass: {
                        popup: 'swal2-popup-custom'
                    }
                });
            @endif

            // Add loading effect to buttons
            $('.btn').on('click', function() {
                const btn = $(this);
                if (!btn.hasClass('btn-close')) {
                    btn.addClass('btn-loading');
                    setTimeout(() => btn.removeClass('btn-loading'), 2000);
                }
            });
        });
    </script>
@endpush

@push('page-styles')
    <style>
        /* Blue Light Theme Styling - Consistent with Index */
        :root {
            --blue-primary: #2563eb;
            --blue-secondary: #3b82f6;
            --blue-light: #dbeafe;
            --blue-extra-light: #eff6ff;
            --blue-dark: #1e40af;
            --green-light: #dcfce7;
            --green-dark: #166534;
            --yellow-light: #fef3c7;
            --yellow-dark: #d97706;
            --purple-light: #f3e8ff;
            --purple-dark: #7c3aed;
            --red-light: #fee2e2;
            --red-dark: #dc2626;
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

        /* Detail Card Styling */
        .detail-card {
            padding: 1rem;
            background: var(--blue-extra-light);
            border-radius: 8px;
            border: 2px solid var(--blue-light);
            transition: var(--transition);
            cursor: pointer;
        }

        .detail-card:hover,
        .detail-card-hover {
            background: white;
            border-color: var(--blue-primary);
            box-shadow: var(--shadow-medium);
            transform: translateY(-1px);
        }

        .detail-value {
            font-weight: 600;
            color: var(--blue-dark);
            font-size: 0.95rem;
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

        .btn-outline-red {
            border: 2px solid var(--red-dark);
            color: var(--red-dark);
            background: transparent;
        }

        .btn-outline-red:hover {
            background: var(--red-dark);
            color: white;
        }

        .btn-ghost-blue {
            background: var(--blue-extra-light);
            color: var(--blue-primary);
            border: 1px solid var(--blue-light);
        }

        .btn-ghost-blue:hover {
            background: var(--blue-light);
            color: var(--blue-dark);
            border-color: var(--blue-primary);
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

        .avatar-2xl {
            width: 5rem;
            height: 5rem;
        }

        .bg-blue {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%) !important;
        }

        .bg-blue-lt {
            background-color: var(--blue-light) !important;
            color: var(--blue-dark) !important;
        }

        .bg-green-lt {
            background-color: var(--green-light) !important;
            color: var(--green-dark) !important;
        }

        .bg-yellow-lt {
            background-color: var(--yellow-light) !important;
            color: var(--yellow-dark) !important;
        }

        .bg-purple-lt {
            background-color: var(--purple-light) !important;
            color: var(--purple-dark) !important;
        }

        .bg-success-lt {
            background-color: #dcfce7 !important;
            color: #166534 !important;
        }

        /* Text Colors */
        .text-blue {
            color: var(--blue-primary) !important;
        }

        .text-green {
            color: var(--green-dark) !important;
        }

        .text-yellow {
            color: var(--yellow-dark) !important;
        }

        .text-purple {
            color: var(--purple-dark) !important;
        }

        .text-success {
            color: #16a34a !important;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        /* Badge Styling */
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

        /* Font Styling */
        .font-mono {
            font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
            background: #f8fafc;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            color: #475569;
            font-size: 0.875rem;
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
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 1rem;
            height: 1rem;
            top: 50%;
            left: 50%;
            margin-left: -0.5rem;
            margin-top: -0.5rem;
            border: 2px solid transparent;
            border-top-color: currentColor;
            border-radius: 50%;
            animation: btn-loading-spin 0.75s linear infinite;
        }

        @keyframes btn-loading-spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* SweetAlert Custom Styling */
        .swal2-popup-custom {
            border-radius: var(--border-radius) !important;
            box-shadow: var(--shadow-large) !important;
        }

        .swal2-title-custom {
            color: var(--blue-dark) !important;
        }

        .swal2-toast-custom {
            border-radius: 8px !important;
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {

            .card-header,
            .card-footer {
                padding: 1rem;
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

            .detail-card {
                padding: 0.75rem;
            }

            .avatar-2xl {
                width: 4rem;
                height: 4rem;
            }
        }

        /* Enhanced Focus States */
        .btn:focus {
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

        .btn-blue {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
            color: white;
        }

        .btn-blue:hover {
            background: linear-gradient(135deg, var(--blue-dark) 0%, var(--blue-primary) 100%);
            color: white;
        }
    </style>
