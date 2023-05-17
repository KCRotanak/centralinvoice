@extends('merchant.layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Dashboard</h4>
        </div>
        <div class="col-md-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 float-end">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="fs-5 fw-semibold mb-1">Date: <span id="ct"></span>
  
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Total Customers</p>
                            <h2 class="mt-4 fw-semibold"><span class="counter-value"
                                    data-target="{{$customers}}">0</span></h2>
                            {{-- <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                        class="ri-arrow-up-line align-middle"></i> 17.32 %</span> vs. previous month</p> --}}
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                    <i class=" ri-shield-user-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Total Invoices</p>
                            <h2 class="mt-4 fw-semibold"><span class="counter-value"
                                    data-target="{{$invoices}}">0</span></h2>
                            {{-- <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                        class="ri-arrow-down-line align-middle"></i> 0.87 %</span> vs. previous month</p> --}}
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning text-warning rounded-circle fs-4">
                                    <i class="ri-time-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Total Amounts</p>
                            <h2 class="mt-4 fw-semibold"><span class="counter-value"
                                    data-target="{{$totalamounts}}">0</span>$</h2>
                            {{-- <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                        class="ri-arrow-down-line align-middle"></i> 2.52 % </span> vs. previous month</p> --}}
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success text-success rounded-circle fs-4">
                                    <i class="ri-newspaper-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col d-flex justify-content-between">
                            <h5 class="fw-semibold m-0 align-self-center align-items-center"><i class="bx bx-buildings me-2"></i>About Company</h5>
                            <button class="btn btn-secondary waves-effect" data-bs-target="#editModal" data-bs-toggle="modal"
                            id="edit_btn">
                                Edit
                            </button>
                            
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-muted">
                        <span>
                            <h5 class="d-flex mt-3">Company Name:<p class="fw-semibold ps-2">{{ $company ? $company->name : '' }}</p></h5>
                            <h5 class="d-flex mt-3">Phone:<p class="fw-semibold ps-2">{{ $company ? $company->phone : '' }}</p></h5>
                            <h5 class="d-flex mt-3">Email:<p class="fw-semibold ps-2">{{ $company ? $company->email : '' }}</p></h5>
                            <h5 class="d-flex mt-3">Address:<p class="fw-semibold ps-2">{{ $company ? $company->address : '' }}</p></h5>  
                        </span>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- end card -->
    @include('merchant.pages.company.edit')

    <!-- App js -->
    {{-- <script src="assets/js/app.js"></script> --}}
    
@endsection
