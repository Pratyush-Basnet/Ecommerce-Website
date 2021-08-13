@extends('layouts.index')
@section('title','homepage')

@section('content')
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
            <!-- Item -->
            @foreach($home_banner as $list)
            <div class="item item-1">
                <div class="img-fill">
                    <img data-seq src="{{asset('storage/media/banner/'.$list->image)}}" />
                    <div class="text-content">
                        <a href="{{$list->btn_link}}" class="filled-button">{{$list->btn_txt}}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- // Item -->
            <!-- Item -->
            <!-- // Item -->
            <!-- Item -->
            <!-- // Item -->
        </div>
    </div>
@endsection
@section('homepage-exclusive')

    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>What they say <em>about us</em></h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-testimonials owl-carousel">

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>Shrijan Budathoki</h4>
                                <span>Co-owner</span>
                                <p>"Something about something"</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>Ashimit Khadka</h4>
                                <span>Co-owner</span>
                                <p>"Something Somethings."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>David Wood</h4>
                                <span>Chief Accountant</span>
                                <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                        <div class="testimonial-item">
                            <div class="inner-content">
                                <h4>Andrew Boom</h4>
                                <span>Marketing Head</span>
                                <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
                            </div>
                            <img src="http://placehold.it/60x60" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
