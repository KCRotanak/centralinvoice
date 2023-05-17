<div class="modal fade" id="editModal{{$customer->id}}" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content me-auto ms-auto" style="margin-top: 50%">
            <div class="modal-header">
                <h4 class="modal-title fs-3 ms-auto me-auto text-uppercase" id="modelHeading">Edit Customer</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('customers.update', $customer->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-sm-2 m-0 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name" value="{{$customer->name}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="phone" class="col-sm-2 m-0 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter Phone" value="{{$customer->phone}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="email" class="col-sm-2 m-0 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email" value="{{$customer->email}}" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="text" class="col-sm-2 m-0 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Address" value="{{$customer->address}}" maxlength="50">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 mt-2 float-end">
                        <button type="submit" class="btn btn-primary waves-effect" id="saveBtn"
                            value="create">Save
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" id="close-modal"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>