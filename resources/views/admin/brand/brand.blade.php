@extends('admin.master')

@section('title')
    Brand Manage
@endsection

@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Brand Manage
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
                        <button class="nav-link active" id="nav-brand-manage-tab" data-bs-toggle="tab" data-bs-target="#nav-brand-manage" type="button" role="tab" aria-controls="nav-brand-manage" aria-selected="false">Brand Manage</button>
                        <button class="nav-link" id="nav-brand-form-tab" data-bs-toggle="tab" data-bs-target="#nav-brand-form" type="button" role="tab" aria-controls="nav-brand-form" aria-selected="true">Brand Entry Form</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-brand-manage" role="tabpanel" aria-labelledby="nav-brand-manage-tab">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                            <tr class="text-center">
                                <th>Logo</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blist as $brand)
                                <tr class="align-middle text-center">
                                    <td>
                                        <img class="img-fluid" src="{{asset($brand -> brand_logo)}}" alt="Brand Logo" style="height: 5vh"/>
                                    </td>
                                    <td>{{$brand -> brand_name}}</td>
                                    <td>
                                        @if($brand -> brand_status == 1)
                                            <a class="btn btn-primary px-4" href="{{route('edit.state',['id' => $brand -> id])}}">Published</a>
                                        @else
                                            <a class="btn btn-danger" href="{{route('edit.state',['id' => $brand -> id])}}">Unpublished</a>
                                        @endif
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="{{route('edit.brand',['id' => $brand -> id])}}" aria-label="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('delete.brand')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="brand_id" value="{{$brand -> id}}" readonly/>
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
                    <div class="tab-pane fade" id="nav-brand-form" role="tabpanel" aria-labelledby="nav-brand-form-tab">
                        <form action="{{route('save.brand')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 my-3">
                                <label class="form-label lead" for="">Brand Name</label>
                                <input class="form-control" type="text" name="brand_name" id="" required/>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label lead" for="">Brand Logo</label>
                                    <input class="form-control" name="brand_logo" type="file"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label lead" for="">Brand Visibility</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="brand_status" value="1">
                                            <label class="form-check-label" >Published</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="brand_status" value="0">
                                            <label class="form-check-label" >Unpublished</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Enter Brand</b></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
