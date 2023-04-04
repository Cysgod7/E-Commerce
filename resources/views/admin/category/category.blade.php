@extends('admin.master')

@section('title')
    Category Manage
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Category Manage
                    @if($message = Session::get('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </h4>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-category-manage-tab" data-bs-toggle="tab" data-bs-target="#nav-category-manage" type="button" role="tab" aria-controls="nav-category-manage" aria-selected="false">Category Manage</button>
                        <button class="nav-link" id="nav-category-form-tab" data-bs-toggle="tab" data-bs-target="#nav-category-form" type="button" role="tab" aria-controls="nav-category-form" aria-selected="true">Category Entry Form</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-category-manage" role="tabpanel" aria-labelledby="nav-category-manage-tab">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                            <tr class="text-center">
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Clist as $category)
                                <tr class="align-middle text-center">
                                    <td>{{$category -> cat_name}}</td>
                                    <td>
                                        @if($category -> cat_status == 1)
                                            <a class="btn btn-primary px-4" href="{{route('edit.cat.state',['id' => $category -> id])}}">Published</a>
                                        @else
                                            <a class="btn btn-danger" href="{{route('edit.cat.state',['id' => $category -> id])}}">Unpublished</a>
                                        @endif
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{route('edit.category',['id' => $category -> id])}}" aria-label="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('delete.category')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="cat_id" value="{{$category -> id}}" readonly/>
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
                    <div class="tab-pane fade" id="nav-category-form" role="tabpanel" aria-labelledby="nav-category-form-tab">
                        <form action="{{route('save.category')}}" method="post">
                            @csrf
                            <div class="col-md-12 my-3">
                                <label class="form-label lead" for="">Category Name</label>
                                <input class="form-control" type="text" name="cat_name" id="" required/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label lead" for="">Category Visibility</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cat_status" value="1">
                                        <label class="form-check-label" >Published</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cat_status" value="0">
                                        <label class="form-check-label" >Unpublished</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Enter Category</b></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
