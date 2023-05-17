@extends('merchant.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Invoice</h4>
        </div>
        <div class="col-md-2">
            <ul class="breadcrumb m-0 float-end">
                <li>About</li>
                <li class="active"><i class='bx bx-chevron-right'></i>Edit</li>
            </ul>
        </div>
    </div>

    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="card">
                <form action="{{ route('invoices.update', $invoice->id) }}" enctype="multipart/form-data" method="post"
                    class="form-horizontal needs-validation" novalidate id="invoice_form">
                    @csrf
                    @method('PUT')
                    {{-- <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate id="invoice_form"> --}}
                    <div class="card-body border-bottom border-bottom-dashed p-4">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="profile-user">
                                    <input id="profile-img-file-input" name="image" type="file" value="{{ $invoice->image }}"
                                        class="profile-img-file-input" onchange="showPreview(event);" />
                                    <label for="profile-img-file-input" class="d-block" tabindex="0">
                                        <span
                                            class="overflow-hidden border border-2 border-dashed d-flex align-items-center justify-content-center rounded-3"
                                            style="height: 200px; width: auto; cursor: pointer">
                                            {{-- <img src="{{ asset('assets/images/logoweb.png') }}" alt=""
                                                height=""> --}}
                                            <img src="{{ asset('assets/images/' . $invoice->image) }}" id="file-ip-preview"
                                                width="280px" height="200px" alt="error" class="right-0">
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!--end col-->
                            {{-- <form action="{{ route('companies.update', $company->id) }}">
                                @csrf --}}
                                {{-- <h5><span class="text-muted fw-normal">Name:</span>
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
                                </h5> --}}
                            @if ($company->name == '...')
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-5 text-end">
                                            <label class="fs-2 text-muted text-uppercase fw-semibold">Company</label>
                                        </div>
                                        <div class="col-7"></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyName">Name :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-white fs-5 border-0" value=""
                                                placeholder="Empty" id="companyName" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyPhone">Phone :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-white fs-5 border-0" value=""
                                                placeholder="Empty" id="companyPhone" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyEmail">Email :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="email" class="form-control bg-white fs-5 border-0" placeholder="Empty"
                                                value="" id="companyEmail" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyAddress">Address :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <textarea type="text" rows="2" placeholder="Empty" class="form-control bg-white fs-5 border-0" id="companyAddress"
                                                maxlength="" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="row">
                                        <div class="col-5 text-end">
                                            <label class="fs-2 text-muted text-uppercase fw-semibold">Company</label>
                                        </div>
                                        <div class="col-7"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyName">Name :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-white fs-5 border-0"
                                                value="{{ $company->name }}" id="companyName" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyPhone">Phone :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-white fs-5 border-0"
                                                value="{{ $company->phone }}" id="companyPhone" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyEmail">Email :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="email" class="form-control bg-white fs-5 border-0"
                                                value="{{ $company->email }}" id="companyEmail" disabled />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 pt-2 pe-0 text-end">
                                            <label class="text-muted fs-5 fw-semibold" for="companyAddress">Address :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <span type="text" rows="2" class="form-control bg-white fs-5 border-0" id="companyAddress" disabled>{{ $company->address }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- </form> --}}
                        </div>
                        <!--end row-->
                    </div>

                    <div class="card-body border-bottom border-bottom-dashed p-4">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label class="text-muted fs-5 text-uppercase fw-semibold">Customer</label>

                                <select class="form-select bg-light" name="company_id" hidden>

                                    <option value="{{ $company->id }}">{{ $company->id }} </option>

                                </select>

                                <select class="form-select bg-light" name="customer_id" style="cursor: pointer; font-size: 16.25px">
                                    <option value="{{ $invoice->customer->id }}">{{ $invoice->customer->name }}:
                                        {{ $invoice->customer->phone }}</option>
                                    @foreach ($customers as $customer)
                                        @if ($customer->id == $invoice->customer->id)
                                            <div disabled></div>
                                        @else
                                            <option value="{{ $customer->id }}">{{ $customer->name }}:
                                                {{ $customer->phone }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <input type="hidden" class="form-control bg-light border-0" id="invoicenoInput"
                                    placeholder="Invoice No" name="refnumber" />
                                <label class="text-muted fs-5 text-uppercase fw-semibold">Date</label>
                                {{-- <form> --}}
                                <input type="date_time" class="form-control fs-5 bg-light border-0" id="selectdatetime"
                                    placeholder="Select Date-time" value="{{ $invoice->date }}" name="date">
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                <thead class="align-middle">
                                    <tr class="table-active fs-5">
                                        <th scope="col" style="width: 330px;">Product Details</th>
                                        <th scope="col" style="width: 150px;">Unit Price($)</th>
                                        <th scope="col" style="width: 140px;">Quantity</th>
                                        <th scope="col" style="width: 150px;">Amount</th>
                                        <th scope="col" style="width: 1px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="list_item" class="list_item">

                                    @foreach ($invoice->items as $key => $item)
                                        <tr>
                                            <td class="text-start">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control fs-5 bg-light border-0"
                                                        placeholder="Product Name" value="{{ $item->product }}"
                                                        name="item[{{ $key }}][product]" />
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="unitprice form-control fs-5 bg-light border-0"
                                                    id="unitprice" step="0.01" placeholder="0.00"
                                                    value="{{ $item->unitprice }}"
                                                    name="item[{{ $key }}][unitprice]" onchange="Calc(this);" />
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="quantity form-control fs-5 bg-light border-0"
                                                    id="quantity" placeholder="00" value="{{ $item->quantity }}"
                                                    name="item[{{ $key }}][quantity]" onchange="Calc(this);" />
                                            </td>
                                            <td>
                                                <input type="number"
                                                    class="amount1 form-control fs-5 bg-light border-0"
                                                    id="amount1" step="0.01" placeholder="$0.00"
                                                    value="{{ $item->amount }}"
                                                    name="item[{{ $key }}][amount]" hidden />
                                                <input type="number"
                                                    class="amount form-control fs-5 bg-light border-0"
                                                    id="amount" step="0.01" placeholder="$0.00"
                                                    value="{{ $item->amount }}"
                                                    name="item[{{ $key }}][amount]" disabled />
                                            </td>
                                            <td class="product-removal">
                                                <a class="btn btn-success fs-5 removebtn">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    {{-- <tr id="newForm" style="display: none;">
                                            <td class="d-none" colspan="5">
                                                <p>Add New Form</p>
                                            </td>
                                        </tr> --}}
                                    <tr>
                                        <td colspan="5">
                                            <a id="add-item" onclick="additem({{ count($invoice->items) }})"
                                                class="btn btn-soft-secondary fs-5 fw-medium"><i
                                                    class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-top-dashed mt-2">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="p-0">
                                            <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                <tbody>
                                                    <tr class="fs-5">
                                                        <th scope="row">Sub Total</th>
                                                        <td style="width:150px;">
                                                            <input type="number" name="subtotal"
                                                                class="subtotal form-control bg-light border-0" id="subtotal1"
                                                                placeholder="$0.00" value="{{ $invoice->subtotal }}" hidden />
                                                            <input type="number" name="subtotal"
                                                                class="subtotal form-control fs-5 bg-light border-0" id="subtotal"
                                                                placeholder="$0.00" value="{{ $invoice->subtotal }}" disabled />
                                                        </td> 
                                                    </tr>
                                                    <tr class="fs-5"> 
                                                        <th scope="row">Tax: <input type="number" value="{{ number_format($old_tax,2) }}" onchange="GetTaxPercen(this);" class="taxpercen bg-light border-0" placeholder="00" name="taxpercen" id="taxpercen" maxlength="7" style="border-radius: 3px; border:none; width: 50px" >%</th>
                                                        <td>
                                                            <input type="number" name="tax" 
                                                                class="taxvalue1 form-control bg-light border-0" id="taxvalue1"
                                                                placeholder="$0.00" value="{{ $invoice->tax }}" hidden />
                                                            <input type="number" name="taxvalue" 
                                                                class="taxvalue form-control fs-5 bg-light border-0" id="taxvalue"
                                                                placeholder="$0.00" value="{{ $invoice->tax }}" disabled />
                                                        </td>
                                                    </tr>
                                                    <tr class="fs-5">
                                                        <th scope="row">Discount: <input type="number" value="{{ number_format($old_discount,2) }}" onchange="GetDisPercen(this);" class="dispercen bg-light border-0" placeholder="00" name="dispercen" id="dispercen" maxlength="7" style="border-radius: 3px; border:none; width: 50px">%</th>
                                                        <td>
                                                            <input type="number" name="discount"
                                                                class="discount form-control bg-light border-0" id="discount1"
                                                                placeholder="0.00%" value="{{ $invoice->discount }}" hidden />
                                                            <input type="number" name="discount"
                                                                class="discount form-control fs-5 bg-light border-0" id="discount"
                                                                placeholder="0.00%" value="{{ $invoice->discount }}" disabled />
                                                        </td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed fs-5">
                                                        <th scope="row">Total Amount</th>
                                                        <td>
                                                            <input type="number" name="totalamount"
                                                                class="form-control bg-light border-0" id="totalamount1"
                                                                placeholder="$0.00"
                                                                value="{{ $invoice->totalamount }}" hidden />
                                                            <input type="number" name="totalamount"
                                                                class="form-control fs-5 fw-semibold bg-light border-0" id="totalamount"
                                                                placeholder="$0.00"
                                                                value="{{ $invoice->totalamount }}" disabled />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end row-->

                        <input type="text" hidden name="totalValue" value="{{ count($invoice->items) }}">

                        <button class="btn btn-primary fs-5 waves-effect" type="submit">
                            Save
                        </button>
                        <a class="btn btn-secondary fs-5 waves-effect" href="{{ route('invoices.index') }}">
                            Back
                        </a>

                    </div>

                    {{-- </form> --}}

                </form>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <script>
        let i = 0;
        var index = 0;

        function additem(num) {
            ++i;
            index = Number(num) + Number(i);

            let html = `<tr>
                        <td class="text-start">
                            <div class="mb-2">
                                <input type="text" class="form-control fs-5 bg-light border-0"
                                    placeholder="Product Name" name="item[` + index + `][product]" />
                            </div>
                        </td>
                        <td>
                            <input type="number" class="unitprice form-control fs-5 product-price bg-light border-0"
                                id="unitprice" placeholder="0.00" name="item[` + index + `][unitprice]" onchange="Calc(this);"/>
                        </td>
                        <td>
                            <input type="number" class="quantity form-control fs-5 product-quantity bg-light border-0"
                                id="quantity" placeholder="00" name="item[` + index + `][quantity]" onchange="Calc(this);"/>
                        </td>
                        <td>
                            <input type="number"
                                class="amount1 form-control product-line-price bg-light border-0"
                                id="amount1" placeholder="$0.00" name="item[` + index + `][amount]" hidden />
                            <input type="number"
                                class="amount form-control product-line-price fs-5 bg-light border-0"
                                id="amount" placeholder="$0.00" name="item[` + index + `][amount]" disabled />
                        </td>
                        <td class="product-removal">
                            <a class="btn btn-success fs-5 removebtn">Delete</a>
                        </td>
                    </tr>`;

            $(".list_item").append(html);
        };
        // document.getElementById("list_item").innerHTML += x;
        $(document).on('click', ".removebtn", function() {
            $(this).closest('tr').remove();
        });
    </script>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
     <script>
        function Calc(v) {
            // console.log('me');
            /*Detail Calculation Each Row*/
            var closest = $(v).closest('tr');

            var unit = closest.find(".unitprice").val();
            var qty = closest.find(".quantity").val();

            var amt = (parseFloat(qty) * parseFloat(unit)).toFixed(2);
            // console.log(amt);
            closest.find(".amount1").val(amt);
            closest.find(".amount").val(amt);

            GetSubTotal();
        };

        function GetSubTotal() {
            /*Footer Calculation*/
            var closest = $(this).closest('tr');
            var sum = 0;
            $('.amount').each(function(el){
                sum = sum + parseFloat($(this).val());
            })

            document.getElementById("subtotal").value = sum;
            document.getElementById("subtotal1").value = sum;
            ShowTotalamount();
            GetTaxPercen();   
            GetDisPercen();
        }
        function GetTaxPercen() {
            /*Footer Calculation*/
            var x = $('.subtotal').val();
            var tax = $('.taxpercen').val() || 0;

            var ValueTax = (parseFloat(tax) * (parseFloat(x) / 100)).toFixed(2);


            document.getElementById("taxvalue1").value = ValueTax;
            document.getElementById("taxvalue").value = ValueTax;
            ShowTotalamount();  

        }
        function GetDisPercen() {

            var x = $('.subtotal').val();
            var discount = $('.dispercen').val() || 0;
            // var y = x / 100;
            
            var ValueDiscount = (parseFloat(discount) * (parseFloat(x) / 100)).toFixed(2);

            document.getElementById("discount1").value = ValueDiscount;
            document.getElementById("discount").value = ValueDiscount;
            
            ShowTotalamount();  

        }
        function ShowTotalamount() {
         
            var x = $('.subtotal').val();
            var y = $('.taxvalue').val() || 0;
            var ValueDiscount = $('.discount').val() || 0;
            // console.log(ValueDiscount+'hello');
            
            var total = (parseFloat(x) + parseFloat(y) - parseFloat(ValueDiscount)).toFixed(2);

            document.getElementById("totalamount1").value = total;
            document.getElementById("totalamount").value = total;

        }
    </script>
@endsection
