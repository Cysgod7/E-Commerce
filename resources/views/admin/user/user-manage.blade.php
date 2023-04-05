@extends('admin.master')

@section('title')
    Manage User
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="align-middle">
                            <td>{{$i++}}</td>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="{{route('edit.user',['id'=> $user->id ])}}" aria-label="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
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
