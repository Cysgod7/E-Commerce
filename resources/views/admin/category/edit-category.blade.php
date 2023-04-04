@extends('admin.master')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                <form action="{{route('update.category')}}" method="post">
                    @csrf
                    <input type="hidden" name="cat_id" value="{{$Clist -> id}}" readonly/>
                    <div class="col-md-12 my-3">
                        <label class="form-label lead" for="">Category Name</label>
                        <input class="form-control" type="text" name="cat_name" id=""  value="{{$Clist -> cat_name}}" required/>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Update Category</b></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
