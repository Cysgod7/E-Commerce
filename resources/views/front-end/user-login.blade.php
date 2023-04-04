@extends('front-end.master')

@section('title')
    User Login
@endsection

@section('content')
    <div class="container">
        <div class="row align-items-center m-5">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="blog-content-wrap p-4">
                    <h4 class="text-center text-danger">{{session('message')}}</h4>
                    <form class="comment-form" action="{{route('user.login.check')}}" method="post">
                        @csrf
                        <h3>Login</h3>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <input type="text" class="form-control" name="user_name" placeholder="User Name or Phone"/>
                            </div>
                            <div class="col-12 col-md-6 mb-4 row">
                                <input type="password" class="form-control col-md-10" name="user_password" autocomplete="current-password" required="" id="id_password">
                                <i class="far fa-eye col-md-1" id="togglePassword" style="margin:10px 0 0 -40px; cursor: pointer;"></i>
                            </div>
                        </div>
                        <button class="btn btn-solid" style="margin: 10px 0 0 0" type="submit">Login</button>
                    </form>
                    <div>
                        <h6>Don't have an account? <a href="{{route('new.user')}}">Register</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
