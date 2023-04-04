@extends('front-end.master')

@section('title')
    Register
@endsection

@section('content')
    <div class="container" style="padding: 10px 0">
        <div class="row align-items-center m-5">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="blog-content-wrap p-4">
                    <form class="comment-form" action="{{route('save.user')}}" method="post">
                        @csrf
                        <h3>Registration</h3>
                        <div class="row" style="padding: 10px 0">
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="cust_name" placeholder="Full Name">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" class="form-control" name="cust_email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 0">
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="cust_phone" placeholder="Phone">
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="cust_password" placeholder="Password"/>
                            </div>
                        </div>
                        <button class="btn btn-solid" style="padding: 10px" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
