@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mt-1">
            <div class="card-header">
                <h4>Manage Product</h4>
                @if($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="card-body table-responsive">
                @php $i = 1 @endphp
                <table class="table table-hover" id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Price $</th>
                        <th>State</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $product)
                        <tr class="align-middle">
                            <td>{{$i++}}</td>
                            <td>
                                <img class="img-fluid" src="{{asset($product -> product_image)}}" alt="Product Image" style="height: 5vh"/>
                            </td>
                            <td>{{$product -> product_name}}</td>
                            <td>{{$product -> brand_name}}</td>
                            <td>{{$product -> cat_name}}</td>
                            <td>{{$product -> entry_date}}</td>
                            <td>{{$product -> product_price}}</td>
                            <td>
                                @if($product -> product_status == 1)
                                    <a class="btn btn-primary px-4" href="{{route('edit.product.state',['id' => $product -> id])}}">Published</a>
                                @else
                                    <a class="btn btn-danger" href="{{route('edit.product.state',['id' => $product -> id])}}">Unpublished</a>
                                @endif
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.product',['id' => $product -> id])}}" aria-label="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{route('delete.product')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product -> id}}" readonly/>
                                                <button class="btn" type="submit"><i class="fa-regular fa-trash-can" style="color: red"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
