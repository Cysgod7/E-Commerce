@extends('front-end.master')

@section('title')
    Products Page
@endsection

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper text-center">
                                    <img class="card-img" src="{{asset($product -> product_image)}}" alt="Product Image" style="height: 20vh">
                                </div>
                                <h2><a href="{{route('details.product',['id' => $product -> id])}}">{{$product -> brand_name}} {{$product -> product_name}}</a></h2>
                                <p>{{substr($product -> product_des,0,100)}}</p>
                                <div class="product-carousel-price">
                                    <ins>${{$product -> product_price}}.00</ins>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-pagination text-center">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
