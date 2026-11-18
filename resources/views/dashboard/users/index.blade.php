@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Manajemen Pengguna</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-user-plus fa-sm text-white-50 mr-1"></i> Tambah Pengguna
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Card Data Users -->
    <div class="card shadow-sm mb-4">
        <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Pegawai & Pejabat</h6>
            <span class="badge badge-primary">{{ $users->total() }} Pengguna Terdaftar</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th style="width: 160px;">Peran (Role)</th>
                            <th style="width: 160px;">Tanggal Dibuat</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $u)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td class="font-weight-bold text-dark">
                                    {{ $u->name }}
                                    @if(auth()->id() == $u->id)
                                        <span class="badge badge-secondary ml-1">Akun Anda</span>
                                    @endif
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    @if($u->role === 'admin')
                                        <span class="badge badge-primary px-2 py-1"><i class="fas fa-user-shield mr-1"></i>Administrator</span>
                                    @elseif($u->role === 'kadis')
                                        <span class="badge badge-success px-2 py-1"><i class="fas fa-briefcase mr-1"></i>Kepala Dinas</span>
                                    @else
                                        <span class="badge badge-secondary px-2 py-1">{{ ucfirst($u->role) }}</span>
                                    @endif
                                </td>
                                <td>{{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm mr-1" title="Edit Akun">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if(auth()->id() != $u->id)
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal{{ $u->id }}" title="Hapus Akun">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada pengguna terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="small text-muted">
                    Menampilkan {{ $users->firstItem() ?? 0 }} sampai {{ $users->lastItem() ?? 0 }} dari {{ $users->total() }} pengguna
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus User -->
@foreach($users as $u)
    @if(auth()->id() != $u->id)
        <div class="modal fade" id="deleteUserModal{{ $u->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $u->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold" id="deleteUserModalLabel{{ $u->id }}">Konfirmasi Hapus Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus akun <strong>{{ $u->name }}</strong> ({{ $u->email }})? Tindakan ini tidak dapat dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm font-weight-bold">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
@endsection
