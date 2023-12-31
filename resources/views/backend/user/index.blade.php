@extends('backend.layout.base')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">User</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">

<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Tabel User</h3>
        <div class="block-options">
            <div class="block-options-item">
                <a href="{{ route('user.create') }}" class="btn btn-success me-1 mb-3">
                    <i class="fa fa-fw fa-plus me-1"></i> Tambah User
                </a>
            </div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-striped table-vcenter">
            <thead>
                <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hak Akses</th>
                <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $user)
                <tr>
                    <th class="text-center" scope="row">{{ $no++ }}</th>
                    <td class="fw-semibold">
                        <span>{{ $user->name }}</span>
                    </td>
                    <td class="fw-semibold">
                        <span>{{ $user->email }}</span>
                    </td>
                    <td class="fw-semibold">
                        <button class="btn btn-primary">{{ ucfirst($user->role) }}</button>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete">
                                <i class="fa fa-times"></i>
                            </button>
                            
                        </form>
                        </div>
                        <!-- <button type="button" class="js-notify btn btn-alt-success push js-notify-enabled" data-type="success" data-icon="fa fa-check me-1" data-message="App was updated successfully to 1.2 version">
                    <i class="fa fa-bell me-1 opacity-50"></i> Launch Notification
                  </button> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</div>
<!-- END Page Content -->

@endsection

<!-- @section('scriptBottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

        @if (session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif

    </script>
@endsection -->
