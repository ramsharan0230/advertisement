@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h6 class="card-title">Vendor Panel</h6>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('create-advertisement') }}" class="btn btn-success btn-sm pull-right">Create Advertisement</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('home') }}" class="btn btn-success btn-sm pull-right">Go to Banner</a>
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
                                    <th scope="col">title</th>
                                    <th scope="col">Image File</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Expire Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($advertisements as $ad)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{ $ad->title }}</td>
                                            <td><img src="{{ asset('images/').'/'.$ad->image_file }}" class="img-thumbnail" width="100" alt="{{$ad->title}}"></td>
                                            <td>{{ $ad->start_date }}</td>
                                            <td>{{ $ad->expired_date }}</td>
                                            <td>{{ $ad->type }}</td>
                                            <td><a href="#" class="btn btn-info btn-sm">Delete</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Data Found!!!</td>
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
