@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    <div class="row">
                       <div class="col-sm-12">
                        <form method="POST" action="{{ route('create-vendor') }}" >
                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Type Fullame...">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Type Email Address">
                              </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" name="password" class="form-control" id="password" placeholder="Password should be at least 6 characters...">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Conform Password</label>
                                <div class="col-sm-10">
                                  <input type="password" name="password_confirmation" class="form-control" id="password_conformation" placeholder="Re-enter password...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-primary btn-sm"> Save Vendor</button>
                                </div>
                            </div>
                          </form>
                       </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
