@extends('frontend.invoice.layout')
@section('content')


    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4">
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-4 col-md-6">
                                    <img src="{{ asset('assets/images/' . $invoice->image) }}" alt="" width="250px"
                                        height="190px">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h3 class="fw-semibold text-uppercase" style="font-size: 3.5rem">Invoice</h3>
                                    <h5><span class="text-muted fw-normal">Company Name:</span>
                                        <span>{{ $invoice->company->name }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Contact No:</span>
                                        <span>{{ $invoice->company->phone }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Email:</span>
                                        <span>{{ $invoice->company->email }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Address: </span>
                                        <span>{{ $invoice->company->address }}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--end card-header-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-4 col-md-6">
                                    <h4 class="text-muted text-uppercase fw-semibold">Customer information</h4>
                                    <h5><span class="text-muted fw-normal">Name:</span>
                                        <span>{{ $invoice->customer->name }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Telephone:</span>
                                        <span>{{ $invoice->customer->phone }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Email:</span>
                                        <span>{{ $invoice->customer->email }}</span>
                                    </h5>
                                    <h5><span class="text-muted fw-normal">Address: </span>
                                        <span>{{ $invoice->customer->address }}</span>
                                    </h5>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4 col-md-6">
                                    <h5><span class="text-muted text-capitalize fw-normal">Invoice Reference No:</span>
                                        <span>{{ $invoice->refnumber }}</span>
                                    </h5>
                                    <div id="pincode" class="pincode">
                                        <h5><span class="text-muted text-capitalize fw-normal">PIN:</span>
                                            <span class="fw-semibold"> {{ $invoice->pincode }}</span>
                                        </h5>
                                    </div>
                                    <h5 class="mt-4"><span class="text-muted text-capitalize fw-normal">Invoice Date:</span>
                                        <span>{{ $invoice->date }}</span>
                                    </h5>
                                    <h5 class="mt-4"><span class="text-muted text-capitalize fw-normal">Total
                                            Amount:</span>
                                        <span class="fw-semibold">$ {{ $invoice->totalamount }}</span>
                                    </h5>

                                    


                                    <span>
                                        <button class="btn btn-primary" onclick="myFunction()">Click to show pin
                                            code</button>
                                    </span>


                                </div>

                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-lg-12">
                    <div class="card-body border-bottom border-bottom-dashed p-4">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center table-nowrap align-middle mb-0"
                                style="font-size: 16.25px">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" class="text-start" style="width: 50px;">Product Details</th>
                                        <th scope="col" class="">Unit Price(USD)</th>
                                        <th scope="col" class="">Quantity</th>
                                        <th scope="col" class="text-end">Amount(USD)</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">

                                    @foreach ($invoice->items as $key => $item)
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">{{ $item->product }}</span>
                                            </td>
                                            <td>$ {{ $item->unitprice }}</td>
                                            <td>{{ $item->quantity }}</td>


                                            @if ((int) $item->amount == $item->amount)
                                                <td class="text-end">$ {{ number_format($item->amount, 0) }}</td>
                                            @else
                                                <td class="text-end">$ {{ number_format($item->amount, 2) }}</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="border-top border-top-dashed mt-2">
                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                style="width:250px; font-size: 16.25px">
                                <tbody>

                                    <tr>
                                        <td class="text-start pb-0">Sub Total</td>
                                        <td class="text-end pb-0">$ {{ $invoice->subtotal }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-start pb-0">Tax <small
                                                class="text-muted">{{ number_format($old_tax, 2) }}%</small></td>
                                        <td class="text-end pb-0">$ {{ $invoice->tax }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Discount <small
                                                class="text-muted">{{ number_format($old_discount, 2) }}%</small>
                                        </td>
                                        <td class="text-end">$ {{ $invoice->discount }}</td>
                                    </tr>
                                    <tr class="border-top border-top-dashed">
                                        <th scope="row" class="text-start">Total Amount</th>
                                        <th class="text-end">$ {{ $invoice->totalamount }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <div class="hstack gap-2 justify-content-start d-print-none mt-4">
                            {{-- <a href="javascript:window.print()" class="btn btn-success"><i
                                        class="ri-printer-line align-bottom me-1"></i> Print</a> --}}
                            <a href="{{ route('home') }}" class="btn btn-primary waves-effect"><i
                                    class="ri-arrow-go-back-line align-bottom me-1"></i>Back</a>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    </div>
    <!--end row-->
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    {{-- <script>
        function myFunction() {
            var x = document.getElementById("pincode");
            var y = $(".pincode").val('me');
            console.log(y);
            if (x.style.display === "none") {
                x.style.display = "block";
                // $(".pincode").fadeOut( "slow" );
            } else {
                x.style.display = "none";
            }
        }
    </script> --}}

@endsection

