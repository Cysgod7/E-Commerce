@extends('admin.master')

@section('title')
    Product Entry
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Product Entry Form</h4>
            </div>
            <div class="card-body">
                <form action="{{route('enter.product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 mb-3">
                        <label class="form-label lead" for="">Product Name</label>
                        <input class="form-control" type="text" name="product_name" id="" required/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label lead" for="">Product Description</label>
                        <textarea class="form-control" name="product_des" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Brand name</label>
                            <select class="form-control" name="brand_name" id="">
                                <option value="">--Select Brand--</option>
                                @foreach($Blist as $brand)
                                    @if($brand -> brand_status == 1)
                                        <option value="{{$brand -> id}}">{{$brand -> brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Product Category</label>
                            <select class="form-control" name="cat_name" id="">
                                <option value="">--Select Category--</option>
                                @foreach($Clist as $category)
                                    @if($category -> cat_status == 1)
                                        <option value="{{$category -> id}}">{{$category -> cat_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Entry Date</label>
                            <input class="form-control" name="product_date" type="date">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Product Image</label>
                            <input class="form-control" name="product_image" type="file">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Product Price</label>
                            <input class="form-control" name="product_price" type="number">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Product Visibility</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="product_state" value="1"/>
                                    <label class="form-check-label" for="">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="product_state" value="0"/>
                                    <label class="form-check-label" for="">Unpublished</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Enter Product</b></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
