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
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M15.5 7.5l-3 3l-3 -3"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h2 class="page-title mb-0">Manajemen Users</h2>
                            <div class="text-muted mt-1">Kelola dan pantau seluruh pengguna sistem</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="btn-list">
                        <a href="{{ route('users.create') }}" class="btn btn-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Tambah User Baru
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

        @if (session('info'))
            <div class="alert alert-info alert-dismissible mb-4" role="alert">
                <div class="d-flex">
                    <div class="me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-info" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="12" cy="12" r="9"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div>
                        <h4 class="alert-title">Informasi!</h4>
                        <div class="text-muted">{{ session('info') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('users.index') }}">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-10">
                            <label for="search" class="form-label fw-bold text-blue mb-1">Pencarian Users</label>
                            <div class="input-group">
                                <span class="input-group-text bg-blue-lt text-blue">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="18" height="18"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </span>
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Cari nama, username, atau email..." value="{{ request('search') }}">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn-blue w-100 fw-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                Cari / Filter
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-blue w-100 fw-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3">
                                    </path>
                                    <path d="M18 13.3l-6.3 -6.3"></path>
                                </svg>
                                Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                        <h3 class="card-title mb-0 text-blue">Daftar Users</h3>
                        <div class="text-muted small">Total {{ $users->total() }} users terdaftar</div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-vcenter table-nowrap">
                    <thead class="bg-blue text-white">
                        <tr>
                            <th class="text-center" style="min-width: 60px;">No</th>
                            <th style="min-width: 200px;">User</th>
                            <th style="min-width: 150px;">Username</th>
                            <th style="min-width: 200px;">Email</th>
                            <th style="min-width: 150px;">Tanggal Dibuat</th>
                            <th class="text-center" style="min-width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                            <tr class="hover-row">
                                <td class="text-center">
                                    <div class="badge bg-blue-lt text-blue fw-bold">
                                        {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar me-3 bg-blue-lt text-blue">
                                            <span class="fw-bold">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                        </div>
                                        <div>
                                            <div class="fw-medium text-dark">{{ $user->name }}</div>
                                            <div class="text-muted small">Member</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="text-blue fw-medium">@</span>
                                        <span class="detail-value font-mono ms-1">{{ $user->username }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $user->email }}</div>
                                </td>
                                <td>
                                    <div class="fw-medium">{{ $user->created_at->format('d M Y') }}</div>
                                    <small class="text-muted d-block">{{ $user->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="btn btn-ghost-blue btn-md px-3 py-2" title="Lihat Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="22"
                                                height="22" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <path
                                                    d="M22 12c-2.667 4 -6 6 -10 6s-7.333 -2 -10 -6c2.667 -4 6 -6 10 -6s7.333 2 10 6">
                                                </path>
                                            </svg>
                                        </a>
                                        @if ($user->id !== Auth::id())
                                            <button class="btn btn-ghost-red btn-md px-3 py-2"
                                                onclick="confirmDelete('{{ route('users.destroy', $user->id) }}')"
                                                title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md"
                                                    width="22" height="22" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7">
                                                    </line>
                                                    <line x1="10" y1="11" x2="10" y2="17">
                                                    </line>
                                                    <line x1="14" y1="11" x2="14" y2="17">
                                                    </line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </button>
                                        @else
                                            <span class="badge bg-success-lt text-success fw-bold px-3 py-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-1"
                                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                </svg>
                                                You
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty py-5">
                                        <div class="empty-img">
                                            @if (request('search'))
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue"
                                                    width="128" height="128" viewBox="0 0 24 24" stroke-width="1"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                    </line>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-blue"
                                                    width="128" height="128" viewBox="0 0 24 24" stroke-width="1"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        @if (request('search'))
                                            <p class="empty-title text-muted">Tidak ada hasil ditemukan</p>
                                            <p class="empty-subtitle text-muted">
                                                Tidak ada user yang cocok dengan pencarian "{{ request('search') }}"
                                            </p>
                                            <div class="empty-action">
                                                <a href="{{ route('users.index') }}" class="btn btn-outline-blue">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1"
                                                        width="20" height="20" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M5 12l14 0"></path>
                                                        <path d="M13 18l6 -6"></path>
                                                        <path d="M13 6l6 6"></path>
                                                    </svg>
                                                    Kembali ke Semua Users
                                                </a>
                                            </div>
                                        @else
                                            <p class="empty-title text-muted">Belum ada users</p>
                                            <p class="empty-subtitle text-muted">
                                                Mulai dengan menambahkan user pertama untuk sistem Anda
                                            </p>
                                            <div class="empty-action">
                                                <a href="{{ route('users.create') }}" class="btn btn-blue">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                        width="20" height="20" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="12" y1="5" x2="12"
                                                            y2="19">
                                                        </line>
                                                        <line x1="5" y1="12" x2="19"
                                                            y2="12">
                                                        </line>
                                                    </svg>
                                                    Tambah User Pertama
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users->hasPages())
                <div class="card-footer bg-blue-lt border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="d-flex align-items-center text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-blue" width="20"
                                    height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                                <span class="fw-medium">
                                    Menampilkan <span class="text-blue fw-bold">{{ $users->firstItem() ?? 0 }}</span>
                                    sampai <span class="text-blue fw-bold">{{ $users->lastItem() ?? 0 }}</span>
                                    dari <span class="text-blue fw-bold">{{ $users->total() }}</span> users
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex pagination-wrapper">
                                {{ $users->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('page-scripts')
    <script>
        $(document).ready(function() {
            function updateExportForm() {
                $('#export_search').val($('#search').val() || '');

                // Update button appearance
                const hasFilters = $('#search').val();
                const $btn = $('#exportFormBtn');

                if (hasFilters) {
                    $btn.removeClass('btn-outline-blue').addClass('btn-outline-success');
                    $btn.html($btn.html().replace('Export Excel', 'Export Excel (Filtered)'));
                } else {
                    $btn.removeClass('btn-outline-success').addClass('btn-outline-blue');
                    $btn.html($btn.html().replace('Export Excel (Filtered)', 'Export Excel'));
                }
            }

            // Update when filters change
            $('#search').on('change input', updateExportForm);
            updateExportForm(); // Initial call

            // Add loading state on form submit
            $('form').on('submit', function() {
                const $btn = $(this).find('#exportFormBtn');
                if ($btn.length) {
                    $btn.html('<div class="spinner-border spinner-border-sm me-2"></div>Exporting...')
                        .prop('disabled', true);
                }
            });
        });

        function confirmDelete(url) {
            if (confirm(
                    '⚠️ Apakah Anda yakin ingin menghapus user ini?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait user ini.'
                )) {
                const form = document.getElementById('delete-form');
                if (form) {
                    form.action = url;
                    form.submit();
                }
            }
        }

        // Enhanced table interactions
        $(document).ready(function() {
            // Add hover effects for better UX
            $('.hover-row').hover(
                function() {
                    $(this).addClass('table-active');
                },
                function() {
                    $(this).removeClass('table-active');
                }
            );

            // Auto dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert-dismissible').fadeOut('slow');
            }, 5000);

            // Smooth scroll to top when pagination is clicked
            $('.pagination a').on('click', function() {
                const cardElement = $('.card');
                if (cardElement.length) {
                    $('html, body').animate({
                        scrollTop: cardElement.offset().top - 20
                    }, 500);
                }
            });

            // Add loading state to form submissions
            $('form').on('submit', function() {
                const submitBtn = $(this).find('button[type="submit"]');
                if (submitBtn.length) {
                    submitBtn.prop('disabled', true);
                    const originalText = submitBtn.html();
                    submitBtn.html(
                        '<div class="spinner-border spinner-border-sm me-2" role="status"></div>Processing...'
                    );

                    // Reset after 10 seconds as fallback
                    setTimeout(() => {
                        submitBtn.prop('disabled', false);
                        submitBtn.html(originalText);
                    }, 10000);
                }
            });
        });
    </script>
@endpush

@push('page-styles')
    <style>
        /* Blue Light Theme Styling */
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

        /* Modern Table Styling */
        .table-responsive {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            overflow-x: auto;
            background: white;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            letter-spacing: 0.025em;
            padding: 1rem 0.75rem;
            border: none;
            position: sticky;
            top: 0;
            z-index: 10;
            white-space: nowrap;
            text-transform: uppercase;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);
        }

        .table thead th:first-child {
            border-radius: var(--border-radius) 0 0 0;
        }

        .table thead th:last-child {
            border-radius: 0 var(--border-radius) 0 0;
        }

        .table tbody tr {
            transition: var(--transition);
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background: var(--blue-extra-light);
            transform: scale(1.001);
            box-shadow: var(--shadow-light);
        }

        .table tbody tr:nth-child(even) {
            background-color: #fafbff;
        }

        .table tbody tr:nth-child(even):hover {
            background: var(--blue-extra-light);
        }

        .table tbody td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
            border: none;
            font-size: 0.875rem;
            white-space: nowrap;
        }

        /* Enhanced Badge Styling */
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

        .bg-blue-lt {
            background-color: var(--blue-light) !important;
            color: var(--blue-dark) !important;
        }

        .bg-success-lt {
            background-color: #dcfce7 !important;
            color: #166534 !important;
        }

        .text-success {
            color: #16a34a !important;
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

        .btn-outline-success {
            border: 2px solid #16a34a;
            color: #16a34a;
            background: transparent;
        }

        .btn-outline-success:hover {
            background: #16a34a;
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

        .btn-ghost-yellow {
            background: #fef3c7;
            color: #d97706;
            border: 1px solid #fcd34d;
        }

        .btn-ghost-yellow:hover {
            background: #fcd34d;
            color: #92400e;
        }

        .btn-ghost-red {
            background: #fee2e2;
            color: #dc2626;
            border: 1px solid #fca5a5;
        }

        .btn-ghost-red:hover {
            background: #fca5a5;
            color: #991b1b;
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

        .alert-info {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left-color: var(--blue-primary);
            color: var(--blue-dark);
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

        .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .form-select:focus {
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.25);
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

        .input-group:focus-within .input-group-text {
            border-color: var(--blue-primary);
        }

        /* Empty State Styling */
        .empty {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-img svg {
            opacity: 0.6;
            transition: var(--transition);
        }

        .empty:hover .empty-img svg {
            opacity: 0.8;
            transform: scale(1.05);
        }

        /* Footer Styling */
        .card-footer {
            background: var(--gradient-blue);
            border: none;
            padding: 1.5rem;
        }

        /* Pagination Styling */
        .pagination {
            margin: 0;
        }

        .page-link {
            border: none;
            border-radius: 8px;
            margin: 0 0.125rem;
            color: var(--blue-primary);
            background: white;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            font-weight: 500;
        }

        .page-link:hover {
            background: var(--blue-light);
            color: var(--blue-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-medium);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-secondary) 100%);
            border-color: var(--blue-primary);
            box-shadow: var(--shadow-medium);
        }

        /* Detail Value Styling */
        .detail-value {
            font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
            font-size: 0.8125rem;
            background: #f8fafc;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            color: #475569;
        }

        .font-mono {
            font-family: 'SF Mono', 'Monaco', 'Inconsolata', 'Roboto Mono', monospace;
        }

        /* Loading States */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }

        /* Hover Effects */
        .hover-row {
            cursor: pointer;
        }

        /* Text Colors */
        .text-blue {
            color: var(--blue-primary) !important;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        /* Responsive Enhancements */
        @media (max-width: 768px) {
            .card-header {
                padding: 1rem;
            }

            .table {
                font-size: 0.75rem;
            }

            .table th,
            .table td {
                padding: 0.5rem 0.375rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .avatar {
                width: 2rem;
                height: 2rem;
            }

            .avatar span {
                font-size: 0.75rem;
            }
        }

        /* Scrollbar Styling */
        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: var(--blue-extra-light);
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--blue-light) 0%, var(--blue-primary) 100%);
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--blue-primary) 0%, var(--blue-dark) 100%);
        }

        /* Print Styles */
        @media print {
            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            .btn,
            .dropdown {
                display: none !important;
            }

            .table {
                font-size: 0.75rem;
            }
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

        /* Enhanced Focus States */
        .btn:focus,
        .form-control:focus,
        .form-select:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Table Active State */
        .table-active {
            background: var(--blue-extra-light) !important;
        }

        /* Custom checkbox styling */
        .form-check-input:checked {
            background-color: var(--blue-primary);
            border-color: var(--blue-primary);
        }

        /* Tooltip styling */
        .tooltip-inner {
            background-color: var(--blue-primary);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
        }

        .bs-tooltip-auto[data-popper-placement^=top] .tooltip-arrow::before,
        .bs-tooltip-top .tooltip-arrow::before {
            border-top-color: var(--blue-primary);
        }

        /* Toast notifications */
        .toast {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
            border-left: 4px solid var(--blue-primary);
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: var(--blue-extra-light);
            color: var(--blue-dark);
        }

        /* Modal styling */
        .modal-content {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-large);
        }

        .modal-header {
            background: var(--gradient-blue);
            border-bottom: none;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        /* Custom scrollbar for dropdowns */
        .dropdown-menu::-webkit-scrollbar {
            width: 6px;
        }

        .dropdown-menu::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background-color: var(--blue-light);
            border-radius: 3px;
        }

        /* Animation for buttons */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.4);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(37, 99, 235, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 99, 235, 0);
            }
        }

        .btn-pulse {
            animation: pulse 1.5s infinite;
        }

        /* Responsive table cell stacking */
        @media (max-width: 576px) {

            .table-responsive table,
            .table-responsive thead,
            .table-responsive tbody,
            .table-responsive th,
            .table-responsive td,
            .table-responsive tr {
                display: block;
            }

            .table-responsive thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            .table-responsive tr {
                margin-bottom: 1rem;
                border-radius: var(--border-radius);
                box-shadow: var(--shadow-light);
            }

            .table-responsive td {
                border: none;
                position: relative;
                padding-left: 50%;
                white-space: normal;
                text-align: left;
            }

            .table-responsive td:before {
                position: absolute;
                top: 1rem;
                left: 1rem;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                content: attr(data-title);
                font-weight: 600;
                color: var(--blue-dark);
            }
        }
    </style>
@endpush
