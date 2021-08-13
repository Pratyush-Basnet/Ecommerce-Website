@extends('layouts.index')
@section('title','Motorcycle')
@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>List of Motorcycle</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @foreach($motorcycle as $list)
                        <div class="service-item">
                            <img src="{{asset('storage/media/'.$list->image)}}" alt="{{$list->image}}">
                            <div class="down-content">
                                Name: {{$list->name}}
                                <div style="margin-bottom:10px;">
                                </div>
                                Brand: {{$list->brand}}
                                <a href="{{url('motorcycledetail/'.$list->motorcycle_slug)}}" class="filled-button">View More</a>
                            </div>
                        </div>

                        <br>
                    @endforeach
                </div>


            </div>

            <br>
            <br>


            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
@endsection
