<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categories as $indexCategory => $category)
            <li class="{{ $indexCategory == 0 ? 'active' : '' }}">
                <a href="#category_tab_{{ $category->id }}" data-toggle="tab">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach

        </ul>
    </div>
    <div class="tab-content">

        @foreach ($categories as $indexCategoryproduct => $categoryItem)
        <div class="tab-pane fade {{ $indexCategoryproduct == 0 ? 'active in' : '' }}" id="category_tab_{{ $categoryItem->id }}" >

            @foreach ($categoryItem->products as $productItemtabs)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ config('app.base_url').$productItemtabs->feature_image_path }}" alt="" />
                            <h2>{{  number_format($productItemtabs->price) }}</h2>
                            <p>{{  $productItemtabs->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endforeach
    </div>
</div>
