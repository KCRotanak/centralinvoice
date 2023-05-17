@extends('merchant.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Customer</h4>
        </div>
        <div class="col-md-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="{{ route('merchant.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="fs-5 fw-semibold mb-1">Date: <span id="ct"></span>

        </div>
    </div>

    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title mb-0">Data Table</h4>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <button type="button" class="btn btn-success add-btn waves-effect float-end"
                                    data-bs-toggle="modal" id="create-btn" data-bs-target="#addModal"><i
                                        class="ri-add-line align-bottom me-1"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">

                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="invoiceTable">
                                <thead class="table-light ml-4">
                                    <tr>
                                        <th width="4%">ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all ml-4">

                                    {{-- @php $i=1; @endphp --}}
                                    @foreach ($customers as $key => $customer)
                                        @include('merchant.pages.customer.delete')
                                        @include('merchant.pages.customer.edit')
                                        @include('merchant.pages.customer.show')
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->address }}</td>

                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-success"
                                                        data-bs-target="#showModal{{ $customer->id }}"
                                                        data-bs-toggle="modal">View</button>
                                                    <button class="btn btn-primary"
                                                        data-bs-target="#editModal{{ $customer->id }}"
                                                        data-bs-toggle="modal">Edit</button>
                                                    <button class="btn btn-danger"
                                                        data-bs-target="#deleteModal{{ $customer->id }}"
                                                        data-bs-toggle="modal">Delete</button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did
                                        not find any orders for you search.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!--end row-->
    @include('merchant.pages.customer.create')
@endsection
