@extends('front-end.master')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container" style="padding-top: 15px">
        <table class="table table-hover">
            <tbody>
            @foreach($cartItem as $item)
                <tr style="padding-bottom: 5px">
                    <td style="padding: 22px 0 0 5px"><input type="checkbox" id="{{$item -> id}}"/></td>
                    <td>
                        <img class="img-thumbnail" src="{{asset($item -> product_image)}}" alt="Product Image" style="height: 5vh">
                    </td>
                    <td style="padding: 22px 0 0 5px">{{$item -> brand_name}} {{$item ->  product_name}}</td>
                    <td style="padding: 22px 0 0 5px">{{$item -> cat_name}}</td>
                    <td style="padding: 22px 0 0 5px">
                        <a href="{{route('minus.item',['id' => $item -> id])}}" style="color: gray"><i class="fa-solid fa-circle-minus"></i></a>
                        {{$item -> product_quantity}}
                        <a href="{{route('plus.item',['id' => $item -> id])}}" style="color: gray"><i class="fa-solid fa-circle-plus"></i></a>
                    </td>
                    <td style="padding: 22px 0 0 5px">{{$item ->  product_price * $item -> product_quantity}}$</td>
                    <td style="padding: 22px 0 0 5px">
                        <a href="{{route('delete.item',['id' => $item -> id])}}" style="color: red"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            @endforeach
            @if(!$cartItem -> isEmpty())
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>{{Session::get('cartItemPrice')}}$</td>
                    <td></td>
                </tr>
            @else
                <div class="container">
                    <h4 style="color: red">There is no item in the cart <i class="fa-solid fa-cart-shopping"></i></h4>
                    <p>Return to <a href="{{route('all.products')}}">Shop</a> </p>
                </div>
            @endif
            </tbody>
        </table>
    </div>
@endsection
