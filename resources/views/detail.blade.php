@extends('layouts.index')
@section('title','detail')
@section('content')

<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product Detail</h1>
            </span>
            </div>
        </div>
    </div>
</div>

<div class="services">
    <div class="container">
        @foreach($detail as $info)
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

                </div>
                    <br>
                    <br>

                <h1>Brand: {{$info->brand}}</h1>

                <br>

                    <h1>Description of helmet:</h1>
                    <br>

                <h4>{{$info->desc}}</h4>
                <br>
                <br>
                <br>

                <form action="{{url('add-to-cart')}}" method="post">
                    @csrf
                    <input type="hidden"name="product_id" value="{{$info->id}}">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <h1>Rs {{$info->price}}</h1>
                            <br>
                            <br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <form action="">
                                    <select id="quantity" name="quantity">
                                        @for($i=1;$i<11;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    <button type="submit">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </form>

                <br>
            </div>
        </div>

        <br>


    </div>
</div>


<div class="callback-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert_dismissible fade show" role="alert" style="margin-top: 10px;">
                            {{Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" $times;> </span>
                            </button>

                        </div>
                    @endif
                    <h2>Write a <em>review</em></h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="{{route('review')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                                <fieldset>
                                    <input name="product_id" type="hidden" value="{{$info->id}}" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="review" rows="6" class="form-control" id="review" placeholder="review" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="border-button">Send Review</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
    </div>
</div>

@endforeach



@endsection
