@php
use App\Models\Karigar;
$karigars = Karigar::all();
@endphp

<div>
    <form action="{{ route('admin.user_new_requests') }}" method="POST">
        @csrf
        <div class="p-2">
            <input type="text" value="{{ $request['id'] }}" hidden name="form_id">
            <label class="form-label b">Select Karigar</label>
            <select class="form-select" name="selected_karigar" required>
                <option value=""> Select Options</option>
                @foreach ($karigars as $karigar)
                <option style="padding: 5px" class="form-control" value="{{ $karigar->id }}">{{ $karigar->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="p-2 d-flex justify-content-end">
            <button class="btn btn-primary ">Submit</button>
        </div>
    </form>

</div>