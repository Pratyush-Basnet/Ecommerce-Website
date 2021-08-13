@extends('layouts.index')
@section('title','detail')
@section('content')

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Motorcycle Details</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            @foreach($moto as $info)
                <div class="row">
                    <div class="col-md-7">

                        <div>
                            <img src="{{asset('storage/media/'.$info->image)}}" alt="{{$info->image}}}" class="img-fluid wc-image">
                        </div>

                        <br>
                        <br>
                    </div>

                    <div class="col-md-5">
                        @if(Session::has('success_message'))
                            <div class="alert alert-success alert_dismissible fade show" role="alert" style="margin-top: 10px;">
                                {{Session::get('success_message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" $times;> </span>
                                </button>

                            </div>
                        @endif
                        <div class="sidebar-item recent-posts">
                            <div class="sidebar-heading">
                                <h1>Name: {{$info->name}}</h1>
                            </div>
                            <br>
                            <br>
                            <br>

                        </div>

                        <br>
                        <br>

                        <h1>Brand: {{$info->brand}}</h1>

                        <br>
                            <br>
                            <br>
                            <br>
                        <h2>Description of motorcycle:</h2>
                            <br>
                            <br>
                        <h4>{{$info->description}}</h4>
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
