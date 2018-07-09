@extends('master')
@section ('content')
    <div class="content-product">
        <div class="container">
            <div class="row">
                <div class=" col-sm-offset-1 col-sm-4 detail-image">
                    <div class="col-sm-9 main-image">
                        <ul>
                            <?php
                                $images = DB::table('product_images')->where('product_id', $detail->id)->get();
                            ?>
                            @for ($i = 0; $i < count($images); $i++)
                                <li @if ($i == 0) class="active" @else class="hide" @endif style="width: 200px;"><img class="" src="{{url($images[$i]->image)}}" alt="{{$images[$i]->image}}"></li>
                            @endfor
                            {{--<li class="hide"><img src="{{url('assets/images/mh-4.jpg')}}" alt="mh-4"></li>--}}
                            {{--<li class="hide"><img src="{{url('assets/images/mh-5.jpg')}}" alt="mh-5"></li>--}}
                            {{--<li class="hide"><img src="{{url('assets/images/mh-6.jpg')}}" alt="mh-6"></li>--}}
                            {{--<li class="hide"><img src="{{url('assets/images/mh-7.jpg')}}" alt="mh-7"></li>--}}
                        </ul>

                    </div>
                    <div class="col-sm-3 item-image">
                        <ul>
                            @for ($i = 0; $i < count($images); $i++)
                                <li style="width: 200px;"><img class="" src="{{url($images[$i]->image)}}" alt="{{$images[$i]->image}}"></li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class=" col-sm-offset-1 col-sm-5 detail-info">
                    <div class="name">{{$detail->name}}</div>
                    <div class="description">
                        <div>
                            • Màn hình: 5", IPS LCD, (1280 x 720 pixels)<br>
                            • CPU: Qualcomm Snapdragon 425 MSM8917, Quad core, 1.4 GHz, Cortex A53 <br>
                            • RAM/ROM: 2 GB/16 GB<br>
                            • Camera: 8 MP/5 MP<br>
                            • Pin: Li-Po 2500 mAh<br>
                            • 4G: 4G LTE
                        </div>
                        <hr>
                        <p>{{number_format($detail->promotion_price)}} {{$detail->unit}}</p>
                        <p>Giá trước đây: {{number_format($detail->unit_price)}} {{$detail->unit}}</p>
                        <p>Tiết kiệm: {{number_format($detail->unit_price - $detail->promotion_price)}} {{$detail->unit}}</p>
                        <form action="order.html" method="post">
                            <button class="order" name="product-order" value="order">
                                Đặt hàng ngay
                            </button>
                        </form>
                        <!-- <div class="order">Đặt hàng ngay</div> -->
                    </div>
                </div>
                {{--<div class="col-sm-3 detail-order">--}}
                    {{--<div class="1">Tùy chọn giao hàng</div>--}}
                    {{--<hr>--}}
                    {{--<div class="2">Địa điểm nhận hàng:</div>--}}
                    {{--<hr>--}}
                    {{--<div class="2">Thời gian nhận hàng:</div><div class="3">Thứ hai 30 tháng 10</div>--}}
                    {{--<div class="2">Giao hàng ưu tiên:</div><div class="3">Thứ bảy 28 tháng 10</div>--}}
                    {{--<hr>--}}
                    {{--<div class="2">Hình thức thanh toán:</div>--}}
                    {{--<div class="3">Chuyển khoản</div>--}}
                    {{--<div class="3">Thanh toán khi nhận hàng</div>--}}
                    {{--<hr>--}}
                    {{--<div class="3">Đổi trả miễn phí trong 7 ngày</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-sm-9">
                <div class="product-detail">
                    <div class="container">
                        <div role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Chi tiết sản phẩm</a>
                                </li>
                                <li role="presentation">
                                    <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Thông số kỹ thuật</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="detail-tab">
                                        {!! $detail->description !!}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab">
                                    <div class="detail-tab">
                                        {!! $detail->technical !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-type-item">
                    <br>
                    <div class="row">
                        <span style="font-size: 20px;">Sản phẩm cùng loại</span>
                    </div>
                    <br>
                    <ul>
                        @foreach($sameType as $st)
                        <li>
                            <div class="row">
                                <div class="col-sm-4"><img style="height: auto; width: 100%;" src="{{url($st->image)}}" class="img-responsive"></div>
                                <div class="col-sm-8">
                                    <h4>{{$st->name}}</h4>
                                    <p>{{number_format($st->promotion_price)}} {{$st->unit}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="product-comment">
        <div class="container">
            <div class="title">
                Bình luận
            </div>
            <div class="underline">

            </div>
            <div class="pre-comment">
                <!-- <div class="left">
                    <div class="user-profile">
                        <img src="images/mh-10.jpg" alt="user">
                    </div>
                    <div class="head"></div>
                    <div class="user-name">
                        cankuro.19
                    </div>
                    <div class="time-comment">Mon Oct 23, 21:59</div>
                </div>
                <div class="right">
                    <div class="content-comment">
                        <div class="rate-comment"></div>
                        <div class="comment"></div>
                        <div class="like-comment"></div>
                        <div class="reply-comment"></div>
                    </div>
                </div> -->


            </div>
            <form>
                <textarea name="comment" style="width: 100%; height: 100px;">

                </textarea>
                <input type="button" name="product-submit" value="Đăng">
            </form>
        </div>

    </div>
@endsection