@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h6 class="card-title">General User</h6>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ route('create-advertisement') }}" class="btn btn-success btn-sm pull-right">Create Advertisement</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            {{-- banner --}}
                            @if(count($banners)>0)
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                                <ol class="carousel-indicators">
                                    @foreach($banners as $key => $banner)
                                    {{-- @php var_dump($key) @endphp --}}
                                        @if($key==0)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
                                        @else
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                                        @endif
                                    @endforeach
                                  </ol>
                                    
                                    <div class="carousel-inner">
                                        @foreach($banners as $key => $banner)
                                        <!-- slider images -->
                                        @if($key==0)
                                        <div class="carousel-item active">
                                        @else
                                        <div class="carousel-item">
                                        @endif
                                            <img src="{{ asset('images').'/'.$banner->image_file }}" class="d-block w-100" alt="{{$banner->title}}">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $banner->title }}</h5>
                                            </div>
                                        </div>
                                        <!-- slider images -->
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                            </div>
                            @else
                            <div class="alert alert-danger">
                                <p>No Banner Found</p>
                            </div>
                            @endif
                            {{-- banner end --}}
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
