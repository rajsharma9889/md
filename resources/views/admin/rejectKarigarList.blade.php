@extends('template')
@section('content')
<div class="row">
    <h6 class="mb-0 text-uppercase">{{ $page_data['page_title'] }}</h6>
    {{-- <div class="col-6">
    </div>
    <div class="col-6 text-end px-0 px-lg-3">
        <button type="button"
            onclick="ajaxModal('{{ url('ajaxModal/modal_files.add_karigar') }}', sendObj({'_token' : '{{ csrf_token() }}'}))"
            class="btn btn-primary btn-sm px-3"><i class='bx bx-plus'></i>Add</button>
    </div> --}}
</div>
<hr />
<div class="card" ng-app="paginationApp" ng-controller="paginationController">
    <div class="card-body">
        @include('components.pagination-header')
        <div class="table-responsive">
            <table class="table no-footer" style="width:100%; border: 1px solid #e9ecef">
                <thead class="table-light">
                    <tr id="thead-html">
                        <th>S no.</th>
                        <th>Karigar Name </th>
                        <th>Karigar M.N. </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate="item in users | filter: q | itemsPerPage: usersPerPage" total-items="totalUsers"
                        current-page="pagination.current">

                        <td>@{{ getSerialNumber($index) }}</td>
                        <td>@{{ item.karigar.name }}</td>
                        <td>@{{ item.karigar.mobile_number }}</td>

                        <td>
                            <div class="dropdown dropstart d-flex order-actions">
                                <a href="javascript:;" class="mx-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="py-1">
                                        <a href="javascript:;" class="dropdown-item px-3"
                                            style="all: unset; cursor: pointer;"
                                            ng-click="ajaxModal('{{ url('ajaxModal/modal_files.showreason') }}', sendObj({'_token' : '{{ csrf_token() }}', 'id' : item.id}))">View</a>
                                    </li>

                                </ul>
                            </div>
                        </td>

                    </tr>
                    <tr ng-if="totalUsers <= 0">
                        <td id="no-data">
                            <div class="text-center">No data available in table</div>
                        </td>
                    </tr>
                </tbody>
            </table>
            @include('components.pagination-footer')
        </div>
    </div>
</div>
@endsection