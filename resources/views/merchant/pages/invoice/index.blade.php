@extends('merchant.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Invoice</h4>
        </div>
        <div class="col-md-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item"><a href="{{ route('merchant.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="fs-5 fw-semibold mb-1">Date: <span id="ct"></span>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="mt-2">Data Table</h4>
                        </div>
                        <div class="col-lg-6">
                            <a href="{{ route('invoices.create') }}" type="button"
                                class="btn btn-success add-btn float-end" id="create-btn"><i
                                    class="ri-add-line align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="fixed-header" class="table table-hover table-bordered table-group-divider dt-responsive nowrap table-striped align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ref.Number</th>
                                {{-- <th>Pin</th> --}}
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Total Amount (USD)</th>
                                <th>Date of Invoice</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $key => $invoice)
                                @include('merchant.pages.invoice.delete')
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $invoice->refnumber }}</td>
                                    {{-- <td>1234</td> --}}
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->customer->email }}</td>
                                    <td>{{ $invoice->customer->phone }}</td>
                                    <td>{{ $invoice->totalamount }} $</td>
                                    <td>{{ $invoice->date }}</td>
                                    <td>
                                        {{-- <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="#!" class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <div class="d-flex gap-2">                       
                                            <a class="btn btn-success waves-effect" href="{{route('invoices.show', $invoice->id)}}">
                                                View
                                            </a>
                                            <a class="btn btn-primary waves-effect" href="{{route('invoices.edit', $invoice->id)}}">
                                                Edit
                                            </a>
                                            <button class="btn btn-danger waves-effect" data-bs-target="#deleteModal{{ $invoice->id }}"
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
                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did
                                not find any orders for you search.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
