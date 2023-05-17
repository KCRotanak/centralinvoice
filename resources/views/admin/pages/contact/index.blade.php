@extends('admin.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Merchants</h4>
        </div>
        <div class="col-md-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 float-end">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                    </div>
                </div>
                <div class="card-body">

                    <table class="table align-middle table-nowrap" id="myTable" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th width="50px">ID</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                                @include('admin.pages.contact.delete')
                                <tr>
                                    <td class="id" width="50px">{{ ++$key }}</td>
                                    <td class="email">{{ $contact->email }}</td>
                                    <td class="subject" width="150px">{{ $contact->subject }}</td>
                                    <td class="message">{{ $contact->message }}</td>
                                    <td width="280px">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-danger" data-bs-target="#deleteModal{{ $contact->id }}"
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

    <!-- App js -->
    <script src="assets/js/app.js"></script>
@endsection
