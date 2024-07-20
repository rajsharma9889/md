@php
use App\Models\KarigarRequestList;
$Request = KarigarRequestList::find($request['id']);
@endphp

<textarea style="all: unset" cols="30" rows="10" disabled>{{ $Request->reason }}</textarea>