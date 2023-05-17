@extends('merchant.layouts.app')
@section('content')
    <div class="row page-title-box d-flex align-items-center justify-content-between">
        <div class="col-md-10">
            <h4 class="mb-sm-0">Invoice</h4>
        </div>
        <div class="col-md-2">
            <ul class="breadcrumb m-0 float-end">
                <li>About</li>
                <li class="active"><i class='bx bx-chevron-right'></i>Create</li>
            </ul>
        </div>
    </div>

    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-xxl-10">
            <div class="card">
                <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal needs-validation" novalidate>
                    @csrf
                    <div class="card-body border-bottom border-bottom-dashed p-4">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                {{-- <div class="preview">
                                    <img id="file-ip-1-preview" width="280px" style="border-radius:10px">
                                    <input type="file" id="file-ip-1" accept="image/*" hidden onchange="showPreview(event);" style="width: 100%; height: 10vh;">
                                    <label for="file-ip-1" class="d-block btn btn-success wavy-effect" tabindex="0" >Upload Image</label>
                                </div> --}}
                                <div class="profile-user">
                                    <input id="profile-img-file-input" type="file" name="image"
                                        class="profile-img-file-input" onchange="showPreview(event);" required />
                                    <label for="profile-img-file-input" class="d-block" tabindex="0">
                                        <span
                                            class="overflow-hidden border border-2 border-dashed d-flex align-items-center justify-content-center rounded-3"
                                            style="height: 200px; width: auto; cursor: pointer" required>
                                            <img width="280px" id="file-ip-1-preview"
                                                src="{{ asset('assets/images/uploadimage.png') }}" alt=""
                                                height="200px" required>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!--end col-->
                            {{-- <a action="{{ route('companies.update', $company->id) }}">
                                @csrf --}}
                            @if ($company->name == '...')
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label class="text-muted text-uppercase fw-semibold">Company</label>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyName">Name :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-light border-0" value=""
                                                placeholder="Empty" id="companyName" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyPhone">Phone :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-light border-0" value=""
                                                placeholder="Empty" id="companyPhone" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyEmail">Email :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="email" class="form-control bg-light border-0" placeholder="Empty"
                                                value="" id="companyEmail" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyAddress">Address :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <textarea type="text" rows="2" placeholder="Empty" class="form-control bg-light border-0" id="companyAddress"
                                                maxlength="" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <label class="text-muted text-uppercase fw-semibold">Company</label>

                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyName">Name :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-light border-0"
                                                value="{{ $company->name }}" id="companyName" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyPhone">Phone :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="text" class="form-control bg-light border-0"
                                                value="{{ $company->phone }}" id="companyPhone" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyEmail">Email :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <input type="email" class="form-control bg-light border-0"
                                                value="{{ $company->email }}" id="companyEmail" disabled />
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3 pt-2 text-end">
                                            <label class="text-muted fw-semibold" for="companyAddress">Address
                                                :</label>
                                        </div>
                                        <div class="col-9 ps-0">
                                            <textarea type="text" rows="2" class="form-control bg-light border-0" id="companyAddress" disabled>{{ $company->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- </a> --}}
                        </div>
                        <!--end row-->
                    </div>
                    {{-- <form action="{{ route('invoices.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf --}}
                    <div class="card-body p-4">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <label class="text-muted text-uppercase fw-semibold">Customer</label>

                                <select class="form-select bg-light" name="company_id" style="cursor: pointer" hidden>
                                    <option value="{{ $company->id }}">{{ $company->id }} </option>
                                </select>

                                <select class="form-select bg-light" name="customer_id" style="cursor: pointer">
                                    <option>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}:
                                            {{ $customer->phone }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <input type="hidden" class="form-control bg-light border-0" id=""
                                    placeholder="Invoice No" name="refnumber" />
                                <input type="hidden" class="form-control bg-light border-0" id=""
                                    placeholder="PIN Code" name="pincode" />
                                <label class="text-muted text-uppercase fw-semibold">Date</label>
                                {{-- <form> --}}
                                <input class="form-control bg-light border-0" id="selectdatetime"
                                    placeholder="Select Date-time" name="date" required>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                <thead class="align-middle">
                                    <tr class="table-active">
                                        <th scope="col" style="width: 330px;">Product Details</th>
                                        <th scope="col" style="width: 150px;">Unit Price($)</th>
                                        <th scope="col" style="width: 140px;">Quantity</th>
                                        <th scope="col" style="width: 150px;">Amount($)</th>
                                        <th scope="col" style="width: 1px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="list_item" class="list_item">
                                    {{-- <tr>
                                        <td class="text-start">
                                            <div class="mb-2">
                                                <input type="text" class="form-control bg-light border-0"
                                                    placeholder="Product Name" name="item[` + i + `][product]" required />
                                                <div class="invalid-feedback">
                                                    Please enter a product name
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control product-price bg-light border-0"
                                                id="productRate-1" step="0.01" placeholder="0.00" name="item[` + i + `][unitprice]" onchange="Calc(this)" required />
                                            <div class="invalid-feedback">
                                                Please enter a rate
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control product-quantity bg-light border-0"
                                                id="product-qty-1" placeholder="00" name="item[` + i + `][quantity]" onchange="Calc(this)" required />
                                            <div class="invalid-feedback">
                                                Please enter Quantity
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number"
                                                class="form-control product-line-price bg-light border-0"
                                                id="product-price" step="0.01" placeholder="$0.00" name="item[` + i + `][amount]" required />
                                            <div class="invalid-feedback">
                                                Please enter Amount
                                            </div>
                                        </td>
                                        <td class="product-removal">
                                            <a class="btn btn-success removebtn">Delete</a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                                <tbody>
                                    {{-- <tr id="newForm" style="display: none;">
                                            <td class="d-none" colspan="5">
                                                <p>Add New Form</p>
                                            </td>
                                        </tr> --}}
                                    <tr>
                                        <td colspan="5">
                                            <a id="add-item" onclick="additem()"
                                                class="btn btn-soft-secondary fw-medium"><i
                                                    class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                        </td>
                                    </tr>
                                    <tr class="border-top border-top-dashed mt-2">
                                        <td colspan="2"></td>
                                        <td colspan="3">
                                            <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                <tbody>
                                                    <tr >
                                                        <th class="text-end" scope="row">Sub Total: </th>
                                                        <td>
                                                            <input type="number" name="subtotal" value=""
                                                                class="subtotal form-control bg-light border-0"
                                                                id="subtotal1" placeholder="$0.00"
                                                                hidden />

                                                            <input type="number" name="subtotal" value=""
                                                                class="subtotal form-control bg-light border-0"
                                                                id="subtotal" placeholder="$0.00"
                                                                disabled />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-end" scope="row">Tax: <input type="number" value="0" onchange="GetTaxPercen(this);" class="taxpercen bg-light border-0" placeholder="00" name="taxpercen" id="taxpercen" maxlength="7" style="border-radius: 3px; border:none; width: 40px">%</th>
                                                        <td>
                                                        
                                                            <input type="number" name="tax"
                                                                class="taxvalue form-control bg-light border-0" id="taxvalue1"
                                                                placeholder="$0.00" step="0.01" hidden onchange="ShowTotalamount(this);"/>

                                                            <input type="number" name="tax"
                                                                class="taxvalue form-control bg-light border-0" id="taxvalue"
                                                                placeholder="$0.00" step="0.01" disabled onchange="ShowTotalamount(this);"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-end" scope="row">Discount: <input type="number" value="0" onchange="GetDisPercen(this);" class="dispercen bg-light border-0" placeholder="00" name="dispercen" id="dispercen" maxlength="7" style="border-radius: 3px; border:none; width: 40px">%</th>
                                                        <td>
                                                            <input type="number" name="discount"
                                                                class="discount form-control bg-light border-0" id="discount1"
                                                                placeholder="$0.00" step="0.01" hidden onchange="ShowTotalamount(this);"/>
                                                            <input type="number" name="discount"
                                                                class="discount form-control bg-light border-0" id="discount"
                                                                placeholder="$0.00" step="0.01" disabled onchange="ShowTotalamount(this);"/>
                                                        </td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">
                                                        <th class="text-end" scope="row">Total Amount: </th>
                                                        <td>
                                                            <input type="number" name="totalamount"
                                                                class="totalamount form-control bg-light border-0" id="totalamount1"
                                                                placeholder="$0.00" step="0.01" hidden />
                                                            <input type="number" name="totalamount"
                                                                class="totalamount form-control bg-light border-0" id="totalamount"
                                                                placeholder="$0.00" step="0.01" disabled />
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

                        <button class="btn btn-primary waves-effect" type="submit">
                            Save
                        </button>
                        <a class="btn btn-secondary waves-effect" href="{{ route('invoices.index') }}">
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

        function additem() {
            ++i;
            let html = `<tr>
                        <td class="text-start">
                            <div class="mb-2">
                                <input type="text" class="form-control bg-light border-0"
                                    placeholder="Product Name" name="item[` + i + `][product]" required />
                            </div>
                        </td>
                        <td>
                            <input type="number" class="unitprice form-control product-price bg-light border-0"
                                id="unitprice" step="0.01" placeholder="0.00" name="item[` + i + `][unitprice]" onchange="Calc(this);" required />
                        </td>
                        <td>
                            <input type="number" class="quantity form-control product-quantity bg-light border-0"
                                id="quantity" placeholder="00" name="item[` + i + `][quantity]" required onchange="Calc(this);" />
                        </td>
                        <td>
                            <input type="number"
                                class="amount1 form-control product-line-price bg-light border-0" id="amount1"
                                step="0.01" placeholder="$0.00" name="item[` + i + `][amount]" hidden />
                            <input type="number"
                                class="amount form-control product-line-price bg-light border-0" id="amount"
                                step="0.01" placeholder="$0.00" name="item[` + i + `][amount]" disabled />
                        </td>
                        <td class="product-removal">
                            <a class="btn btn-success removebtn">Delete</a>
                        </td>
                    </tr>`;

            $(".list_item").append(html);
            // document.getElementById("list_item").innerHTML += x;
            $(document).on('click', ".removebtn", function() {
                $(this).closest('tr').remove();
            });

        };
    </script>
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
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

            var amt = qty * unit;
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
        }
        function GetTaxPercen() {
            // var closest = $(this).closest('tr');
            /*Footer Calculation*/
            var x = $('#subtotal').val();
            var tax = $('#taxpercen').val();

            // var y = x / 100;
            var ValueTax = (tax * (x / 100)).toFixed(2);

            document.getElementById("taxvalue1").value = ValueTax;
            document.getElementById("taxvalue").value = ValueTax;
            ShowTotalamount();  

        }
        function GetDisPercen() {
   
            var x = $('#subtotal').val();
            var discount = $('#dispercen').val();
            // var y = x / 100;
            
            var ValueDiscount = (discount * (x / 100)).toFixed(2);

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
