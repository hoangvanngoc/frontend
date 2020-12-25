@extends('layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <form action="{{ route('checkout.post') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-12 clearfix">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        <div class="bill-to">
                            <p style="font-size:30px; color: rgb(37, 37, 221);opacity:0.6;">Thông tin khách hàng</p>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="col-md-6"  style="height: 10%; top: 0; bottom:0;">
                                <div class="mb-3">
                                    <label for="username">Họ và Tên</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" value="{{ old('fullName') }}" name="fullName" id="username" placeholder="Họ và tên" required="">

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="you@example.com" required="">

                                </div>
                                <div class="mb-3">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control"  name="address" value="{{ old('address') }}" id="address" placeholder="1234 Main St" required="">

                                </div>
                                <div class="mb-3">
                                    <label for="address2">Sô điện thoại <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" value="{{ old('phoneNumber') }}" name="phoneNumber" id="address2" required="" placeholder="Apartment or suite">
                                </div>
                            </div>

                                {{-- <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div> --}}
                                <br>
                                <div style="float: right" class="form-two ">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Ghi chú" rows="10"></textarea>
                                </div>
                                <br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <section id="cart_items">
                        <div class="container">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Ảnh minh họa</td>
                                        <td class="description">Đơn giá/1 </td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="price">Giá</td>
                                        <td class="total">xử lý</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(session('cart'))
            @foreach(session('cart') as $id => $details)

                <?php $total += $details['price'] * $details['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            {{-- {{ config('app.base_url').$details['feature_image_path'] }} --}}

                            <div class="col-sm-3 hidden-xs"><img src="{{ config('app.base_url').$details['feature_image_path']  }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                <h4></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($details['price']) }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }} VND</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        {{-- @endif --}}
                                    {{-- @if(count($products)>0)
                                        @foreach($products as $item)
                                            <tr>
                                                <td class="cart_product" style="margin: 0px">
                                                    @if($item->options->image_path)
                                                        <img width="100px" height="100px" src="{{ asset($item->options->image_path) }}" alt="" />
                                                    @else
                                                        <img width="100px" height="100px" src="{{ asset('layouts/images') }}/home/product1.jpg" alt="" />
                                                    @endif
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href="">{{ $item->name }}</a></h4>

                                                    <p>Web ID: {{ $item->id }}</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>{{ number_format($item->price)}} VNĐ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    {{ $item->qty }}
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{ number_format($item->subtotal)}}
                                                        VNĐ</p>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                        <tr>
                                            <td colspan="4">&nbsp;
                                            <span>
                                            <a class="btn btn-default update" href="{{ url('/cart')}}">Quay về giỏ
                                                hàng</a>
                                            </span>

                                            </td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tbody>
                                                    <tr>
                                                        <td>Tổng:</td>
                                                        <td><span>{{ number_format($total) }} VNĐ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-default check_out"
                                                               href="{{ url('checkout')}}">Gửi đơn hàng</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Bạn không có sản phẩm trong giỏ hàng</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                                <a class="btn btn-default update" href="{{ url('/')}}">Mua hàng</a>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <!--/#cart_items-->
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
<script>
    (function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
</script>
