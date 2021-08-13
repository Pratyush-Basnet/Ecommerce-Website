@extends('layouts.index')
@section('title','detail')
@section('content')

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>User Products</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            @foreach($userproductsdetail as $info)
                <div class="row">
                    <div class="col-md-7">

                        <div>
                            <img src="{{asset('storage/media/'.$info->image)}}" alt="{{$info->image}}}" class="img-fluid wc-image">
                        </div>

                        <br>
                        <br>
                    </div>

                    <div class="col-md-5">
                        <div class="sidebar-item recent-posts">
                            <div class="sidebar-heading">
                                <h1>Name: {{$info->name}}</h1>
                            </div>

                        </div>

                        <br>
                        <br>
                        <br>

                        <h1>Brand: {{$info->brand}}</h1>

                        <br>
                        <br>
                        <br>

                        <h1>Rs. {{$info->Price}}</h1>

                        <br>
                        <br>
                        <br>


                        <h2>Description of product: {{$info->short_desc}}</h2>
                        <br>
                        <br>
                        <br>

                        <br>
                    </div>
                </div>

                <br>


        </div>
    </div>

    @endforeach



@endsection
