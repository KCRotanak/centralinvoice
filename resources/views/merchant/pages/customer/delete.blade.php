<div class="modal fade" id="deleteModal{{$customer->id}}" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content me-auto ms-auto" style="margin-top: 50%">
            {{-- <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div> --}}
            <div class="modal-body">
                <form action="{{ route('customers.destroy', $customer->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                            </lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you Sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger " >>Yes,
                                Delete It!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>