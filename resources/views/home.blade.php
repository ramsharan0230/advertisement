@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h6 class="card-title">Admin Panel</h6>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('create-vendor') }}" class="btn btn-success btn-sm pull-right">Create Vendor</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            @if ($message = Session::get('success'))
                                <div class="row alert alert-success alert-block">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close pull-right" data-dismiss="alert">×</button>
                                </div>
                            @endif
                            @if ($message = Session::get('danger'))
                                <div class="row alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close pull-right" data-dismiss="alert">×</button>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><a href="#" class="btn btn-info btn-sm">Delete</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Data Found!!!</td>
                                        </tr>
                                    @endforelse
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
