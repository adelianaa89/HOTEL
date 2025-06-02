@extends('template.app')
@section('title', 'Users')
@section('content')
    <div class="page-heading">
        <h3>Kelola Users</h3>
    </div>
    <div class="page-content">
        @if (session('message'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="card-title">Daftar Users</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="users" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name ?? '-' }}</td>
                                    <td>{{ $item->username ?? '-' }}</td>
                                    <td>{{ $item->email ?? '-' }}</td>
                                    <td>{{ $item->no_hp ?? '-' }}</td>
                                    <td>{{ $item->address ?? '-' }}</td>
                                    <td>{{ $item->role ?? '-' }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .badge {
            font-size: 0.85em;
            padding: 0.35em 0.65em;
        }

        /* Tambahan style untuk gambar */
        .table img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [
                        3
                    ] // Non-aktifkan sorting untuk kolom aksi (indeks 3 karena sekarang ada kolom gambar)
                }],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });
        });
    </script>
@endpush
