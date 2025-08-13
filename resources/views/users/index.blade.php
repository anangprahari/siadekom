@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Manajemen
                    </div>
                    <h2 class="page-title">
                        <i class="fas fa-users me-2"></i>
                        Daftar Users
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <i class="fas fa-plus me-1"></i>
                            Tambah User Baru
                        </a>
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-list me-2"></i>
                                Data Users
                            </h3>
                            <div class="card-actions">
                                <div class="input-group input-group-flat">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Cari user..."
                                        autocomplete="off">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-vcenter table-mobile-md card-table" id="usersTable">
                                    <thead>
                                        <tr>
                                            <th class="w-1">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Tanggal Dibuat</th>
                                            <th class="w-1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $index => $user)
                                            <tr id="user-row-{{ $user->id }}">
                                                <td>
                                                    <span class="text-secondary">{{ $index + 1 }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex py-1 align-items-center">
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">{{ $user->name }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-secondary">{{ $user->username }}</div>
                                                </td>
                                                <td>
                                                    <div class="text-secondary">{{ $user->email }}</div>
                                                </td>
                                                <td>
                                                    <div class="text-secondary">
                                                        {{ $user->created_at->format('d M Y') }}
                                                        <br>
                                                        <small>{{ $user->created_at->format('H:i') }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="{{ route('users.show', $user) }}"
                                                            class="btn btn-white btn-sm" data-bs-toggle="tooltip"
                                                            title="Lihat Detail">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('users.edit', $user) }}"
                                                            class="btn btn-white btn-sm" data-bs-toggle="tooltip"
                                                            title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-white btn-sm text-danger"
                                                            onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')"
                                                            data-bs-toggle="tooltip" title="Hapus User">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-5">
                                                    <div class="empty">
                                                        <div class="empty-img">
                                                            <i class="fas fa-users fa-4x text-muted mb-3"></i>
                                                        </div>
                                                        <p class="empty-title">Belum ada users</p>
                                                        <p class="empty-subtitle text-secondary">
                                                            Mulai dengan menambahkan user pertama Anda
                                                        </p>
                                                        <div class="empty-action">
                                                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                                                <i class="fas fa-plus me-1"></i>
                                                                Tambah User Pertama
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

        .avatar {
            position: relative;
        }

        .avatar-img {
            border: 2px solid #fff;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, .1);
        }

        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .card-table td {
            vertical-align: middle;
        }

        .btn-list .btn {
            margin-right: 0.5rem;
        }

        .btn-list .btn:last-child {
            margin-right: 0;
        }

        .search-highlight {
            background-color: #fff3cd;
            padding: 2px 4px;
            border-radius: 3px;
        }

        /* Debug styles - hapus setelah testing */
        .debug-info {
            font-size: 0.7rem;
            color: #999;
            margin-top: 2px;
        }
    </style>
@endpush

@push('page-scripts')
    <script>
        $(document).ready(function() {
            console.log('Users index page loaded');

            // Debug: Check image paths
            $('.avatar-img').each(function() {
                console.log('Image src:', $(this).attr('src'));
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Search functionality
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                var hasResults = false;

                $('#usersTable tbody tr').filter(function() {
                    var shouldShow = $(this).text().toLowerCase().indexOf(value) > -1;
                    $(this).toggle(shouldShow);
                    if (shouldShow && !$(this).hasClass('no-results')) {
                        hasResults = true;
                    }
                    return shouldShow;
                });

                // Remove existing no results row
                $('#usersTable tbody .no-results').remove();

                // Add no results row if needed
                if (!hasResults && value.length > 0) {
                    $('#usersTable tbody').append(`
                <tr class="no-results">
                    <td colspan="7" class="text-center py-4">
                        <div class="text-secondary">
                            <i class="fas fa-search me-2"></i>
                            Tidak ada hasil yang ditemukan untuk "<strong>${value}</strong>"
                        </div>
                    </td>
                </tr>
            `);
                }
            });

            // Clear search
            $('#searchInput').on('input', function() {
                if ($(this).val() === '') {
                    $('#usersTable tbody tr').show();
                    $('#usersTable tbody .no-results').remove();
                }
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
    </script>
@endpush
</document_content>
