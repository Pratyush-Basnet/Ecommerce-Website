@extends('layouts.index')
@section('title','detail')
@section('content')
    <div class="callback-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Checkout<em>Conformation</em></h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="contact-form">
                        <form id="contact" action="{{route('addingorder',$item['id'])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Last Name" required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="mobile" type="tel" class="form-control" id="mobile" placeholder="Mobile" required="">
                                    </fieldset>
                                </div>


                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="address" rows="6" class="form-control" id="address" placeholder="address" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="city" type="text" class="form-control" id="city" placeholder="City" required="">
                                    </fieldset>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="district" type="text" class="form-control" id="district" placeholder="District" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="border-button">Conform</button>
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
@endsection
