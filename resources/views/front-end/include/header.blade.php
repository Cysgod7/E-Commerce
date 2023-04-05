<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        @if(Session::get('customerId'))
                            <li><a href="#"><i class="fa fa-user"></i> {{Session::get('customerName')}}</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="{{route('cart.page')}}"><i class="fa-solid fa-cart-shopping"></i> My Cart</a></li>
                            <li><a href="{{route('user.logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        @else
                            <li><a href="{{route('login.page')}}"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="{{route('new.user')}}"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{route('home')}}"><img src="{{asset('front-asset')}}/img/logo.png"></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                @if(Session::get('customerId'))
                <div class="shopping-item">
                    <a href="{{route('cart.page')}}">Cart - <span class="cart-amunt">{{Session::get('cartItemPrice')}} $</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{Session::get('cartItemCount')}}</span></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->


<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('all.products')}}">Shop page</a></li>
                    @if(Session::get('customerId'))
                    <li><a href="{{route('cart.page')}}">Cart</a></li>
                    @endif
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
