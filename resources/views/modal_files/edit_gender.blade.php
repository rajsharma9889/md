@php
use App\Models\Gender;
$gender= Gender::find($request['id']);
@endphp
<div class="card-body p-2">
    <h5 class="mb-4">Edit Gender </h5>
    <form class="row g-3" method="POST" action="{{ route('admin.gender') }}">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <label for="input3" class="form-label">Gender Name<span class="star">★</span></label>
            <input type="text" hidden name="id" value="{{$gender->id}}">
            <input type="text" id="input3" class="form-control" name="gender" value="{{$gender->gender}}" />
        </div>
        <div class="col-md-12 form-group mt-4 d-flex justify-content-end">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" name="submit" class="btn btn-primary px-4">Submit</button>
            </div>
        </div>
    </form>
</div>
