@extends('layouts.master')

@section('title')
    <title>Home page </title>
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('home\home.css') }}">
@endsection
@section('js')
   <script src="{{ asset('home\home.js') }}"></script>
@endsection

<body>
    @section('content')

	<section>
		<div class="container">
			<div class="row">
                <div class="col-sm-3">
                    @include('components.sidebar')
                    </div>

                    <div class="col-sm-9 padding-right">
                        <!--features_items-->
                        <div class="features_items">
                            <h2 class="title text-center">Danh sách sản phẩm </h2>

                            @foreach ($kqSearch as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ config('app.base_url').$product->feature_image_path }}" alt="" />
                                            <h2>{{ number_format($product->price) }} VND</h2>
                                            <p>{{ $product->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ number_format($product->price) }} VND</h2>

                                                <a href="{{ URL::to("product/product_detail/{$product->id}") }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        {{-- {{  $products->links()  }} --}}
                        </div><!--features_items-->

                </div>
			</div>
		</div>
	</section>

 @endsection


</body>
</html>

</body>
</html>
