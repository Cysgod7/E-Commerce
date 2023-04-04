@extends('admin.master')

@section('title')
    User Edit
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Password Update Form</h4>
            </div>
            <div class="card-body">
                <form action="{{route('update.user')}}" method="post">
                    @csrf
                    @if(Auth::user()-> id == $user -> id)
                        <input type="hidden" name="user_id" value="{{$user->id}}" readonly/>
                        <div class="col-md-12 mb-3">
                            <label class="form-label lead" for="">Name</label>
                            <input class="form-control" type="text" name="name" id="" value="{{$user -> name}}" readonly/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label lead" for="">Email</label>
                            <input class="form-control" type="text" name="email" id="" value="{{$user -> email}}" readonly/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label lead" for="">New Password</label>
                            <input class="form-control" type="password" name="password" id="" placeholder="New Password" required/>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-primary" type="submit"><span class="lead"><b>Update</b></span></button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
