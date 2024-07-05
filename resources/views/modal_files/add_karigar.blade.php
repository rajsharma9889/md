<div class="card-body p-2">
    <h5 class="mb-4">Add Karigar </h5>
    <form class="row g-3" method="POST" action="{{ route('admin.karigar') }}">
        @csrf
        <div class="col-md-12">
            <label for="input3" class="form-label">Karigar Name<span class="star">★</span></label>
            <input type="text" id="input3" class="form-control" required name="name" />
        </div>
        <div class="row g-3">
            <div class="col-md-6">

                <label for="mobile-number" class="form-label">Mobile Number<span class="star">★</span></label>
                <input type="number" id="mobile-number" class="form-control" required name="mobile_number" />
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password<span class="star">★</span></label>
                <input type="password" id="password" class="form-control" required name="password" />

            </div>

        </div>
        <div class="col-md-12">
            <label for="address" class="form-label">Address<span class="star">★</span></label>
            <textarea name="address" id="address" required class="form-control" cols="30" rows="10"></textarea>

        </div>
        <div class="col-md-12 form-group mt-4 d-flex justify-content-en d">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" name="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </div>
    </form>
</div>
