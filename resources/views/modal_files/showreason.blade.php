@php
use App\Models\KarigarRequestList;
$Request = KarigarRequestList::find($request['id']);
@endphp

<div>
    <h6>Karigar reject reason</h6>
    {{ $Request->reason }}
</div>