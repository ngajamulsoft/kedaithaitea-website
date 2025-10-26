@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
      <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Users</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.store'),$user->id }}" >
                            @csrf @method('PUT')
                            <div class="row"> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input name="name" type="text" class="form-control" placeholder="Enter Name" 
                                        @error('name') is-invalid @enderror value="{{ $user->name  }}">
                                        @error('name')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input name="email" type="email" class="form-control" placeholder="Enter Email" 
                                        @error('email') is-invalid @enderror value="{{ $user->email  }}">
                                        @error('email')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 

        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role *</label>
                                        <select name="role_id" id="role_id"  @error('role_id') is-invalid @enderror class="selectpicker form-control" data-style="py-0">
                                            @if(count($roles))
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('role_id')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div>
                                                            
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
      </div>
    </div>
@endsection