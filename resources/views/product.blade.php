@extends('layouts.index')
@section('title','Products')
@section('content')
    <!-- Page Content -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Products</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    @foreach($product as $list)
                    <div class="service-item">
                        <img src="{{asset('storage/media/'.$list->image)}}" alt="{{$list->image}}">
                        <div class="down-content">
                            Name: {{$list->name}}
                            <div style="margin-bottom:10px;">
                  <span>
                      Price: {{$list->price}}
                  </span>
                            </div>
                            Brand: {{$list->brand}}
                            <a href="{{url('detail/'.$list->slug)}}" class="filled-button">View More</a>
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
