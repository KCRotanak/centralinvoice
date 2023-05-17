<div class="modal fade" id="addModal" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content me-auto ms-auto" style="margin-top: 50%">
            <div class="modal-header">
                <h4 class="modal-title fs-3 ms-auto me-auto text-uppercase" id="modelHeading">Create Customer</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('customers.store') }}" method="post" class="form-horizontal needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="hidden" class="form-control" id="name" name="name"
                                placeholder="RefNumber" value="" maxlength="50">
                        </div>
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                             placeholder="Enter Name" value="" maxlength="50" required>
                             <div class="invalid-feedback">
                                Please enter name.
                             </div>
                        </div>
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="phone" name="phone"
                            placeholder="Enter Phone" value="" maxlength="15" required>
                             <div class="invalid-feedback">
                                Please enter phone.
                             </div>
                        </div>
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter Email" value="" maxlength="50" required>
                            <div class="invalid-feedback">
                                Please enter email.
                            </div>
                        </div>
                        <label for="address" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="address" name="address"
                            placeholder="Enter Address" value="" required></textarea>
                             <div class="invalid-feedback">
                                Please enter address.
                             </div>
                        </div>
                        
                 
                            <select name="company_id" id="" hidden>
                                <option value="{{ $company->id}}">{{ $company->name}}</option>
                            </select>
               
                        
                    </div>
                    <div class="col-sm-offset-2 col-lg-12 mt-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary waves-effect me-1" id="saveBtn"
                            value="create">Submit
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'
    
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
    
            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>