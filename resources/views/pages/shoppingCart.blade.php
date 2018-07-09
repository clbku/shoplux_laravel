@extends ('master')
@section ('content')
<div class="shopping-cart">
    <br>
    <br>
    <br>
    <div class="container">
        <form method="post" action="{{route('addOrder')}}">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-8">
                    <div class="payment">
                        <div class="row">


                            <div class="payment-box">
                                <div class="row">
                                    <div class="col-sm-1"><input type="radio" value="Giao hàng nhanh" name="payment" id="check1"></div>
                                    <div class="col-sm-2">
                                        <span style="font-size: 50px;"><i class="fa fa-truck"></i></span>
                                    </div>
                                    <div class="col-sm-8">
                                        <h4>Giao hàng nhanh</h4>
                                        <p>Nhận hàng từ 6-9 tháng 7 năm 2018</p>
                                        <p>Phí ship: 30,000 VND</p>
                                    </div>
                                </div>
                            </div>
                            <
                            <div class="payment-box">
                                <div class="row">
                                    <div class="col-sm-1"><input value="Giao hàng Tiêu chuẩn" type="radio" name="payment" id="check2"></div>
                                    <div class="col-sm-2">
                                        <span style="font-size: 50px;"><i class="fa fa-truck"></i></span>
                                    </div>
                                    <div class="col-sm-8">
                                        <h4>Giao hàng chuẩn</h4>
                                        <p>Nhận hàng từ 7-10 tháng 7 năm 2018</p>
                                        <p>Phí ship: Miễn phí</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart">
                        <div class="cart-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="checkbox"> Chọn tất cả
                                </div>
                                <div class="col-sm-2">
                                    Số lượng
                                </div>
                                <div class="col-sm-2">
                                    Giá
                                </div>

                            </div>
                        </div>
                        <div class="cart-list">
                            @foreach($cart as $cart_item)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-1"><input type="checkbox"></div>
                                            <div class="col-sm-4"><img src="{{url($cart_item->options['image'])}}" class="img-responsive"></div>
                                            <div class="col-sm-7">
                                                <h4>{{$cart_item->name}}</h4>
                                                <p>{{$cart_item->options['cate']}}</p>
                                                <div>
                                                    <div><a href="{{route('removeFromCart', $cart_item->rowId)}}" class="fa fa-trash-o"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="0" value="{{$cart_item->qty}}" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        {{number_format($cart_item->price * $cart_item->qty)}} {{$cart_item->options['unit']}}
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="orders-total">
                        <h4>Thông tin khách hàng</h4>
                        <div class="form-group">
                            <label>Họ và tên (*)</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Giới tính (*)</label>
                            <input type="radio" type="text" name="gender" value="Nam"> Nam
                            <input type="radio" type="text" name="gender" value="Nữ"> Nữ
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ (*)</label>
                            <input class="form-control" type="text" name="address" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại (*)</label>
                            <input class="form-control" name="phone" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <input class="form-control" type="text" name="note">
                        </div>
                        <hr>
                        <div class="orders-summary">
                            <h4>Tóm tắt đơn hàng</h4>
                            <div class="row">
                                <div class="col-sm-6">Tổng đơn ({{Cart::count()}} sản phẩm):</div>
                                <div class="col-sm-6"> VND</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">VAT:</div>
                                <div class="col-sm-6">{{Cart::tax()}} VND</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">Phí giao hàng:</div>
                                <div class="col-sm-6" id="ship_value"></div>
                            </div>
                            <script>
                                $('#check1').change(function () {
                                    if ($('#check1').prop("checked")) {

                                        $('#ship_value').text("30,000 VND");
                                    }
                                })
                                $('#check2').change(function () {
                                    if ($('#check2').prop("checked")) {

                                        $('#ship_value').text("0,000 VND");
                                    }
                                })

                            </script>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6"><strong>Tổng</strong></div>
                                <div class="col-sm-6"><strong>{{Cart::total()}} VND</strong></div>
                            </div>
                            <br>
                            <input type="submit" value="Đặt hàng" class="form-control" style="color: white;background-color: #e74c3c;">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection