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

@section('content')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                {{-- danh muc trái --}}
                @include('components.sidebar')
                 {{-- danh muc trái --}}

				</div>

				<div class="col-sm-9 padding-right">

                    {{-- chi tiết sản phẩm  --}}
                    @include('product.product_detail.components.detail_product')
                    {{-- chi tiết sản phẩm  --}}

                    {{-- comment --}}
					@include('product.product_detail.components.tabcomment')
                    {{-- comment --}}

                    {{-- recommend-product --}}
                    @include('home.components.recommend_product')
                	{{-- recommend-product --}}
				</div>
			</div>
		</div>
	</section>
@endsection
