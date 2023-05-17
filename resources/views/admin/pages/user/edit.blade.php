<div class="modal fade" id="editModal{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group" style="">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name" value="{{$user->name}}" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group" style="">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" disabled
                                placeholder="Enter email" value="{{$user->email}}" maxlength="50" required="">
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