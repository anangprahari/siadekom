<div class="table-responsive">
    <table class="table table-vcenter card-table">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Username</th>
                <th>Email</th>
                <th>Tanggal Dibuat</th>
                <th class="w-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $index => $user)
                <tr>
                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span class="avatar me-2">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                            <div>{{ $user->name }}</div>
                        </div>
                    </td>
                    <td>
                        <span class="text-secondary">@</span>{{ $user->username }}
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->created_at->format('d M Y') }}
                        <small class="text-secondary d-block">{{ $user->created_at->format('H:i') }}</small>
                    </td>
                    <td>
                        <div class="btn-list">
                            <a href="{{ route('users.show', $user) }}"
                                class="btn btn-sm btn-outline-primary"
                                title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($user->id !== Auth::id())
                                <button type="button" 
                                        class="btn btn-sm btn-outline-danger"
                                        title="Hapus User"
                                        onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @else
                                <span class="badge bg-secondary-lt">You</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="empty">
                            @if(request('search'))
                                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                <p class="empty-title">Tidak ada hasil ditemukan</p>
                                <p class="empty-subtitle text-secondary">
                                    Tidak ada user yang cocok dengan pencarian "{{ request('search') }}"
                                </p>
                                <a href="{{ route('users.index') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Kembali ke Semua Users
                                </a>
                            @else
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <p class="empty-title">Belum ada users</p>
                                <p class="empty-subtitle text-secondary">
                                    Mulai dengan menambahkan user pertama
                                </p>
                                <a href="{{ route('users.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>
                                    Tambah User
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>