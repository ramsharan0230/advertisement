@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Advertisement</div>

                <div class="card-body">
                    <div class="row">
                       <div class="col-sm-12">
                        <form method="POST" action="{{ route('create-advertisement') }}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                  <input type="text" name="title" class="form-control" id="title" placeholder="Type Title...">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="image_file" class="col-sm-3 col-form-label">Image File</label>
                              <div class="col-sm-9">
                                <input type="file" name="image_file" class="form-control" id="image_file">
                              </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-sm-3 col-form-label">Select Ads Type</label>
                                <div class="col-sm-9">
                                    <select name="type" id="ad-type" class="form-control" onchange="selectType()">
                                        <option value="">Choose Ads Type</option>
                                        <option value="day">Day</option>
                                        <option value="week">Week</option>
                                        <option value="month">Month</option>
                                    </select>
                                </div>
                              </div>
                            <div class="form-group row" data-provide="datepicker">
                                <label for="datetimes" class="col-sm-3 col-form-label">Select Publish and Expire date</label>
                                <div class="col-sm-9">
                                    <input type="text" name="datetimes" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                  <input type="submit" class="btn btn-primary btn-sm" value="Submit"/>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script>
    function selectType(e){
        if($('#ad-type').val() === 'day'){
            console.log($('datetimes').val())
            $(function() {
                $('$datetimes').daterangepicker({
                    timePicker: true,
                    startDate: '2020-06-10',
                    endDate: '2020-08-10',
                    locale: {
                    format: 'YYYY-MM-DD hh:mm:ss A'
                    }
                });
            });
        }
    }
</script>
