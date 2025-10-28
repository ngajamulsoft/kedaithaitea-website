@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Permission List</h4>
                        @if(session('message'))
                        <div class="alert alert-{{ session('type') ?? 'info' }}" role="alert">
                            <div class="iq-alert-text">{{ session('message') ?? '' }}</div>
                        </div>
                        @endif
                    </div>
                    <a href="{{ route('admin.permission.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Create</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            
                            <th>ID</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                
                            <td>
                                
                                <form action="{{ route('admin.permission.destroy',$permission->id) }}" method="POST">
                                    @method('DELETE') @csrf
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('admin.permission.edit',$permission->id) }}"><i class="ri-pencil-line mr-0"></i>
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
                {{ $permissions->links('backend.layouts.partials.customPagination') }}
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection