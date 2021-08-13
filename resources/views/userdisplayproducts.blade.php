@extends('layouts.index')
@section('title','User products')
@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Description of Product</h1>
                </div>
            </div>
        </div>
    </div>
    <a href="{{url('/userdashboard')}}">
        <button type="button" class="btn btn-success">
            Add Product
        </button>
    </a>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @foreach($userproduct as $list)
                    <div class="service-item">
                        <img src="{{asset('storage/media/'.$list->image)}}" alt="{{$list->image}}">
                        <div class="down-content">
                            <h4>{{$list->name}}</h4>
                            <div style="margin-bottom:10px;">
                  <span>
                      <sup>Rs</sup>{{$list->Price}}
                  </span>
                            </div>

                            <a href="{{url('userproductdetail/'.$list->slug)}}" class="filled-button">View More</a>
                        </div>
                    </div>

                    <br>
                    @endforeach
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
