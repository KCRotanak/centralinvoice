<div class="modal fade" style="top: 20%" id="showModal{{ $customer->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3 ms-auto me-auto text-uppercase" id="modelHeading">Customer Information</h4>
            </div>
            <div class="modal-body">

                    <span>
                        <h5 class="d-flex mt-3">Name:
                            <p class="fw-semibold ps-2"type="text" class="" id="name" name="name" placeholder="Enter Name"
                            value="" maxlength="50">{{ $customer->name }}</p></h5>
                        <h5 class="d-flex mt-3">Phone:
                            <p class="fw-semibold ps-2"type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone"
                            value="" maxlength="50">{{ $customer->phone }}</h5>
                        <h5 class="d-flex mt-3">Email:
                            <p class="fw-semibold ps-2"type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            value="" maxlength="50">{{ $customer->email }}</h5>
                        <h5 class="d-flex mt-3">Address:
                            <p class="fw-semibold ps-2"type="text" class="form-control" id="address" name="address" placeholder="Enter Address"
                            value="" maxlength="50">{{ $customer->address }}</p></h5>  
                    </span>
                
                <button type="button" class="btn btn-danger waves-effect float-end" id="close-modal"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                {{-- <div class="col-sm-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                    </button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
