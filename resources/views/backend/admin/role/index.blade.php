@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Role List</h4>
                        @if(session('message'))
                        <div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
                            <div class="iq-alert-text">{{ session('message') ?? '' }}</div>
                        </div>
                        @endif
                    </div>
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Create</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth" role="row">
                            
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">ID</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                
                            <td>
                                
                                <form action="{{ route('admin.role.destroy',$role->id) }}" method="POST">
                                    @method('DELETE') @csrf
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('admin.role.edit',$role->id) }}"><i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    <button style="border:none" type="submit" class="badge bg-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                        <i class="ri-delete-bin-line mr-0"></i>
                                    </button>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $roles->links('backend.layouts.partials.customPagination') }}
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection