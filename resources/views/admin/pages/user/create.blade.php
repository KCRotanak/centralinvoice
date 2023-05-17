<div class="modal fade" id="addModal" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group" style="">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter email" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-12 d-flex">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password" placeholder="Enter your password">
                            <span class="input-icon2 mt-1"><i class="far fa-eye"
                                    id="togglePassword"></i></span>
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="password-confirm" class="col-sm-4 control-label">Confirm
                            Password</label>
                        <div class="col-sm-12 d-flex">
                            <input id="password-confirm" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password"
                                placeholder="Enter your confirm password">
                            <span class="input-icon2 mt-1"><i class="far fa-eye"
                                    id="newtogglePassword"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-lg-10" style="">
                        <button type="submit" class="btn btn-primary" id="saveBtn"
                            value="create">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>