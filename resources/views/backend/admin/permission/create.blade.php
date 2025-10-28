@extends('backend.layouts.app')
@section('content') 
    <div class="content-page">
      <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Permission</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.permission.store') }}" >
                            @csrf 
                            <div class="row"> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permission Name *</label>
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Permission-Name" 
                                        autocomplete="name" autofocus value="{{ old('name') }}">
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
                                         autocomplete="display_name" value="{{ old('display_name') }}">
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
                                         autocomplete="description" value="{{ old('description') }}">
                                        @error('description')                                            
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