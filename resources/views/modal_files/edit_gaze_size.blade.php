@php
    use App\Models\GazeSize;
    $gaze_size = GazeSize::find($request['id']);
@endphp
<div class="card-body p-2">
    <h5 class="mb-4">Edit Gaze Size </h5>
    <form class="row g-3" method="POST" action="{{ route('admin.gaze_size') }}">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="input3" class="form-label">Gaze Size Name<span class="star">★</span></label>
            <input type="text" hidden name="id" value="{{ $gaze_size->id }}">
            <input type="text" id="input3" class="form-control" name="gaze_size"
                value="{{ $gaze_size->gaze_size }}" />
        </div>
        <div class="col-md-12 form-group mt-4 d-flex justify-content-end">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" name="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </div>
    </form>
</div>
