
@if($products)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        @foreach ($products as $product)
        <div class="view-product active">
            <img id="image_to" src="{{  config('app.base_url').$product->feature_image_path }}" alt="" />
            <h3>ZOOM</h3>
        </div>

        <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
                {{-- <div class="carousel-inner"> --}}

                    {{-- <div class="item active">
                      <a href=""><img src="{{  config('app.base_url').$product->feature_image_path }}" alt=""></a>
                    </div> --}}
                    <div class="item active">
                        @foreach ($productImage as  $item)
                        <div style="display:flex;">
                      <a href=""><img id="image_be" style="width: 100px;height:100px;margin-top:5px;" src="{{  config('app.base_url').$item->image_path }}" alt=""></a>
                    </div>
                      @endforeach
                    {{-- </div> --}}
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ $product->name }}</h2>
            <p>Web ID: {{ $product->id }}</p>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>{{number_format( $product->price) }}VND</span>
                <label>Quantity:</label>
                <input type="number" value=" {{ $product->quantity }}" class="form-control quantity" />
                <button type="button" class="btn btn-fefault cart">
                    <a href="{{ url('add-to-cart/'.$product->id) }}"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </button>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <p>{{ strip_tags($product->content) }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
@endforeach
{{-- mặt khác là hiển thị sliders --}}
@elseif($sliders)

@foreach ($sliders as $slider)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">

        <div class="view-product">
            <img src="{{  config('app.base_url'). $slider->feature_image_path }}" alt="" />
            <h3>ZOOM</h3>
        </div>

        <div id="similar-product" class="carousel slide" data-ride="carousel">

              <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>

                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{  $slider->name }}</h2>
            <p>Web ID: 1089772</p>
            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span> {{number_format( $product->price) }}VND</span>
                <label>Quantity:</label>
                <input type="text" value="3" />
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
@endforeach
@endif
<script>

</script>
