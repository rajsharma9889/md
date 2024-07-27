@extends('template')
@section('content')
<div class="row">
    <div class="col-6">
        <h6 class="mb-0 text-uppercase">{{ $page_data['page_title'] }}</h6>
    </div>
    <div class="col-6 text-end px-0 px-lg-3">
        <a href="{{ route('add_category') }}" class="btn btn-primary btn-sm px-3"><i class='bx bx-plus'></i>Add</a>
    </div>
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
                        <th>Category Name </th>
                        <th>Image</th>
                        <th>Status</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate="item in users | filter: q | itemsPerPage: usersPerPage" total-items="totalUsers"
                        current-page="pagination.current">
                        <td>@{{ getSerialNumber($index) }}</td>
                        <td>@{{ item.category }}</td>
                        <th><img width="24px" src="{{ asset('') }}@{{ item.image }}" alt=""></th>
                        <td>
                            <span ng-if="item.status == 1" class="badge rounded-pill bg-success">Active</span>
                            <span ng-if="item.status == 0" class="badge rounded-pill bg-danger">Inactive</span>
                        </td>

                        <td>
                            <div class="dropdown dropstart d-flex order-actions">
                                <a href="javascript:;" class="mx-1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="py-1">
                                        <a class="dropdown-item px-3" style="all: unset; cursor: pointer;"
                                            href="{{ route('admin.category') }}/change_status/@{{ item.id }}">@{{
                                            item.status == 1 ? "Mark Inactive" : "Mark Active" }}</a>
                                    </li>
                                    <li class="py-1">
                                        <a href="{{ route('add_category') }}/@{{ item.id }}" class="dropdown-item px-3"
                                            style="all: unset; cursor: pointer;">Edit</a>
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