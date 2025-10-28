@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
      <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Role</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.role.update',$role->id) }}" >
                            @csrf @method('PUT')
                            <div class="row"> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Permission Name" 
                                         value="{{ $role->name  }}" autocomplete="name" autofocus>
                                        @error('name')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Display Name*</label>
                                        <input name="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" placeholder="Enter Display Name" 
                                         value="{{ $role->display_name  }}">
                                        @error('display_name')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description*</label>
                                        <input name="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" 
                                         autocomplete="description" value="{{ $role->description  }}">
                                        @error('description')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">Permissions*</label>
                                        <div class="col-md-7">

                                            @if (count($permissions))
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox" id=""
                                                            name="permissions_id[]"
                                                            value="{{ $permission->id }}"
                                                            {{ in_array($permission->id, $rolePermissions) ? 'checked="checked"' : '' }}
                                                        >
                                                        <label class="form-check-label" for="">{{ $permission->display_name }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @error('permissions_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                </div>                            
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
      </div>
    </div>
@endsection