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
                        <form method="POST" action="{{ route('admin.user.store') }}" >
                            @csrf
                            <div class="row"> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" 
                                         value="{{ old('name')  }}">
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
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" 
                                         value="{{ old('email')  }}">
                                        @error('email')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Enter Password"  >
                                        @error('password')                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> 
                                        @enderror
                                    </div>
                                </div>  
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password" >
                                        
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role *</label>
                                        <select name="role_id" id="role_id"   class="selectpicker form-control @error('role_id') is-invalid @enderror" data-style="py-0">
                                            @if(count($roles))
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
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
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
      </div>
    </div>
@endsection