@extends('layouts.master')

@section('title')
    <title>Home page </title>
@endsection

@section('css')
   <link rel="stylesheet" href="{{ asset('home\home.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('js')
   <script src="{{ asset('home\home.js') }}"></script>
@endsection

<body>
    @section('content')
@include('home.components.slider')

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				@include('components.sidebar')
				</div>

				<div class="col-sm-9 padding-right">
             <!--features_items-->
                     @include('home.components.feature_product')
             <!--features_items-->

             <!--/category-tab-->
             @include('home.components.category_tab')
				<!--/category-tab-->

                    <!--recommended_items-->
                    @include('home.components.recommend_product')
				<!--/recommended_items-->

				</div>
			</div>
		</div>
    </section>

 @endsection


</body>
</html>
