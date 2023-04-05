@extends('admin.master')

@section('title')
    Edit Brand
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Brand</h4>
            </div>
            <div class="card-body">
                <form action="{{route('update.brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="brand_id" value="{{$blist -> id}}" readonly/>
                    <div class="col-md-12 my-3">
                        <label class="form-label lead" for="">Brand Name</label>
                        <input class="form-control" type="text" name="brand_name" id="" value="{{$blist -> brand_name}}" required/>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label lead" for="">Brand Logo</label>
                            <input class="form-control" name="brand_logo" type="file"/>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="{{asset($blist -> brand_logo)}}" alt="Brand Logo" style="height: 8vh"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Enter Brand</b></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
