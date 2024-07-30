<div class="card-body p-2">
    <h5 class="mb-4">Enter reason</h5>
    <form class="row g-3" method="POST" action="{{ route('admin.user_new_requests') }}/rejected">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <input type="text" value="{{ $request['id'] }}" hidden name="form_id">
            <label for="input3" class="form-label">Reason<span class="star">★</span></label>
            <input type="text" id="input3" class="form-control" required name="reason" />
        </div>
        <div class="col-md-12 form-group mt-4 d-flex justify-content-en d">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" name="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </div>
    </form>
</div>