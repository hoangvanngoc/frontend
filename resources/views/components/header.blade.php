
	<header id="header" ><!--header-->
		<div class="header_top" style="background-color: rgb(132, 151, 168)"><!--header_top-->
			<div class="container" >
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> {{ GetconfigvalueFromTable('phone contact') }}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> {{ GetconfigvalueFromTable('email') }}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href={{ GetconfigvalueFromTable('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle" style=""><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="eshopper/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
                            </div>


							<div class="btn-group">
								<a type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
                            </div>

                    </div>
                    </div>
                    {{-- @include('dashboard') --}}
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">

							<ul class="nav navbar-nav">
                            <li><a style="background-color:rgb(75, 185, 84) ;" href=""><i class="fa fa-user"></i>Account</a></li>
                                <li><a style="background-color:rgb(241, 219, 18) ;" href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                @if(Auth::check())
                                <li><a style="background-color:red ;" href="{{ route('getLogout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                                @else
                                 <li><a style="background-color:green ;" href="{{ route('getLogin') }}"><i class="fa fa-lock"></i> Login</a></li>
                                @endif

                                <li >
                                 {{-- <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 main-section">
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-info" data-toggle="dropdown"> --}}
                                                <a style="background-color:skyblue ;" href="{{  url('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span style="background-color: red;" class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span></a>
                                            {{-- </button>
                                            <div class="dropdown-menu">
                                                <div class="row total-header-section">
                                                    <div class="col-lg-6 col-sm-6 col-6">
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                                    </div>
                                                    <b>xem chi tiết rỏ hàng..</b>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                        <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                </li>

                            </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom" ><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>

            @include('components.mainmenu')

			</div>
					<div class="col-sm-3">

                        <form class="form-inline mr-auto" action="{{ URL::to("product/search") }}" method="GET">
                            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
                          </form>

                        {{-- <div class="search-box">
                            <input class="search-txt" type="text" name="search" placeholder="Type to search">
                            <a class="search-btn" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div> --}}

				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
