@extends('admin.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Admin</h4>
        </div>
        <div class="col-md-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
    </div>
    

    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title m-2">Data Table</h4>
                        </div>

                        <div class="col-md-2">

                            <button class="btn btn-success float-end" data-bs-target="#addModal" data-bs-toggle="modal"
                                id="create_btn"><i class="bx bx-plus m-0"></i>
                                Create User</button>

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <table id="fixed-header" class="table table-hover table-bordered table-group-divider table-striped nowrap dt-responsive align-middle" style="width:100%">
                        <thead class="">
                            <tr>
                                <th width="50px">ID</th>
                                <th>Name</th>
                                <th width="150px">Avatar</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                @include('admin.pages.user.edit')
                                @include('admin.pages.user.delete')
                                <tr>
                                    <td width="50px">{{ ++$key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td width="150px">Avatar</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <a href="{{ route('users.status.update', ['user_id' => $user->id, 'status_code' => 0]) }}"
                                                class="btn btn-success btn-xs m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('users.status.update', ['user_id' => $user->id, 'status_code' => 1]) }}"
                                                class="btn btn-danger btn-xs m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $user->type }}</td>
                                    <td width="280px">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-primary" data-bs-target="#editModal{{ $user->id }}"
                                                data-bs-toggle="modal">Edit</button>
                                            <button class="btn btn-danger" data-bs-target="#deleteModal{{ $user->id }}"
                                                data-bs-toggle="modal">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('admin.pages.user.create')

    <!-- App js -->
    {{-- <script src="js/app.js"></script> --}}
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const newtogglePassword = document.querySelector('#newtogglePassword');
        const password = document.querySelector('#password');
        const confirmpassword = document.querySelector('#password-confirm');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        newtogglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
