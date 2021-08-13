@extends('layouts.index')
@extends('layouts.addtocarts')
@section('title','checkout')
@section('content')

    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total_price = 0;?>
                                        @foreach($userCartItems as $item)
                                        <tr>
                                            <td><a class="remove" href="{{url('checkout/delete/')}}/{{$item['id']}}"><fa class="fa fa-close"></fa></a></td>
                                            <td><a href="#"><img src="{{asset('storage/media/'.$item['product']['image'])}}" alt=""></a></td>
                                            <td><a class="aa-cart-title" href="#">{{$item['product']['name']}}</a></td>
                                            <td>Rs. {{$item['product']['price']}}</td>
                                            <td><input class="aa-cart-quantity" type="number" value="{{$item['quantity']}}"min="1" max="3"></td>
                                            <td class="itotal">Rs. {{$item['product']['price']*$item['quantity']}}</td>
                                            <td><a href="{{route('addorder',$item['id'])}}"><button type="button" class="btn btn-primary">Place order</button></a></td>
                                        </tr>
                                        <?php $total_price = $total_price +($item['product']['price']*$item['quantity']);?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rs.{{$total_price}}</td>
                                    </tr>
                                    </tbody>




                                </table>


                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
