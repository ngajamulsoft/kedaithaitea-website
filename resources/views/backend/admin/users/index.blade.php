@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">User List</h4>
                        @if(session('message'))
                            <x-alert :type="session('type')" :message="session('message')"/>
                        @endif
                    </div>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add User</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role )
                                    {{ $role->display_name }}
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('admin.user.destroy',$user->id) }}" method="post">
                                    @method('DELETE') @csrf
                                <div class="d-flex align-items-center list-action">
                                    
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('admin.user.edit',$user->id) }}"><i class="ri-pencil-line mr-0"></i></a>
                                    <a type="submit" class="badge bg-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                        <i class="ri-delete-bin-line mr-0"></i>
                                    </a>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $users->links() }}
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection