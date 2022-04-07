@extends('layouts.app')
@section('content')
<div class="container">
    <div id="message"></div>
    <div class="row justify-content-center">    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Record') }}</div>
                    <div class="card-body">                    
                        @csrf
                        <div class="form-group row">
                            <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>        
                            </div>                        
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domain" class="col-md-4 col-form-label text-md-right">Domain</label>

                            <div class="col-md-6">
                                <input id="domain" type="domain" class="form-control" name="domain" value="{{ old('domain') }}" required autocomplete="domain">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                  <input type="radio" id="active" name="status" value="1">
                                  <label for="active">Active</label>
                                  <input type="radio" id="inactive" name="status" value="0">
                                  <label for="inactive">Inactive</label>                
                            </div>
                        </div>                       
                        <div class="form-group row">
                            <label for="provisioned" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                  <input type="checkbox" id="provisioned" name="provisioned" value="true">
                                  <label for="provisioned">Provisioned</label>       
                                       
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="destination" class="col-md-4 col-form-label text-md-right">Destination</label>

                            <div class="col-md-6">
                                <input id="destination" type="destination" class="form-control" name="destination" value="{{ old('destination') }}" required autocomplete="destination">
                            </div>
                        </div>                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button  class="btn btn-primary" id="put">
                                Put
                                </button>
                                <button  class="btn btn-primary" id="delete">
                                Delete
                                </button>
                            </div>
                                    
                        </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
