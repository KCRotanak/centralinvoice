<div class="modal fade" id="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-auto ms-auto" style="margin-top: 50%">
            <div class="modal-header">
                <h4 class="modal-title fs-3 fw-bolder ms-auto me-auto text-uppercase" id="modelHeading">Edit Company</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('companies.update', $company->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')

                    @if ($company->name == '...')
                        <div class="form-group">
                            <label for="name" class="col-sm-2 m-0 text-uppercase control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="phone" class="col-sm-2 m-0 text-uppercase control-label">Phone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Phone" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email" class="col-sm-2 m-0 text-uppercase control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="address" class="col-sm-2 m-0 text-uppercase control-label">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter address" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-lg-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary waves-effect me-1" value="create">
                                Save
                            </button>
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="name" class="col-sm-2 m-0 fw-semibold text-uppercase control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Name" value="{{ $company->name }}" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="phone" class="col-sm-2 m-0 fw-semibold text-uppercase control-label">Phone</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter Phone Number" value="{{ $company->phone }}" maxlength="50"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email" class="col-sm-2 m-0 fw-semibold text-uppercase control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" value="{{ $company->email }}" maxlength="50"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email" class="col-sm-2 m-0 fw-semibold text-uppercase control-label">Address</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Enter Address" value="" maxlength=""
                                    required>{{ $company->address }}
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-lg-12 mt-2 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary waves-effect me-1" value="create">
                                Save
                            </button>
                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
