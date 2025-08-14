@extends('layouts.tabler')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Manajemen</div>
                    <h2 class="page-title">
                        <i class="fas fa-users me-2"></i>
                        Daftar Users
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>
                        Tambah User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Users</h3>
                    <div class="card-actions">
                        <form id="searchForm" class="d-flex">
                            <div class="input-group input-group-flat">
                                <input type="text" 
                                       id="searchInput" 
                                       name="search" 
                                       class="form-control" 
                                       placeholder="Cari nama, username, atau email..."
                                       value="{{ $search ?? '' }}"
                                       autocomplete="off">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            @if($search)
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary ms-2" title="Clear Search">
                                    <i class="fas fa-times"></i>
                                </a>
                            @endif
                        </form>
                    </div>
                </div>

                <div id="usersTableContainer">
                    @include('users.partials.users-table', ['users' => $users])
                </div>

                @if($users->hasPages())
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-secondary">
                                Menampilkan {{ $users->firstItem() ?? 0 }} - {{ $users->lastItem() ?? 0 }} 
                                dari {{ $users->total() }} users
                            </div>
                            <div id="paginationContainer">
                                {{ $users->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                @endif
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
        let searchTimeout;

        $(document).ready(function() {
            // Real-time search with debouncing
            $('#searchInput').on('input', function() {
                clearTimeout(searchTimeout);
                const searchValue = $(this).val();

                searchTimeout = setTimeout(function() {
                    performSearch(searchValue);
                }, 500); // Wait 500ms after user stops typing
            });

            // Handle pagination clicks
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                const searchValue = $('#searchInput').val();
                
                loadUsers(url, searchValue);
            });

            // Form submit (fallback for Enter key)
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                const searchValue = $('#searchInput').val();
                performSearch(searchValue);
            });
        });

        function performSearch(searchValue) {
            const baseUrl = "{{ route('users.index') }}";
            const url = searchValue ? `${baseUrl}?search=${encodeURIComponent(searchValue)}` : baseUrl;
            
            loadUsers(url, searchValue);
        }

        function loadUsers(url, searchValue = '') {
            // Show loading state
            $('#usersTableContainer').html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-secondary">Mencari data...</p>
                </div>
            `);

            $.ajax({
                url: url,
                type: 'GET',
                data: { search: searchValue },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(response) {
                    $('#usersTableContainer').html(response.html);
                    
                    if (response.pagination) {
                        $('#paginationContainer').html(response.pagination);
                    }

                    // Update browser URL without page reload
                    const newUrl = searchValue ? 
                        `{{ route('users.index') }}?search=${encodeURIComponent(searchValue)}` : 
                        '{{ route('users.index') }}';
                    
                    window.history.replaceState({}, '', newUrl);
                },
                error: function(xhr) {
                    $('#usersTableContainer').html(`
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Terjadi kesalahan saat memuat data. Silakan refresh halaman.
                        </div>
                    `);
                }
            });
        }

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