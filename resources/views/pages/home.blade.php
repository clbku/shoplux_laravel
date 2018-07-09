@extends ('master')
@section ('content')
<div class="banner">
    <div class="slider">
        <ul>
            @foreach($slides as $slide)
            <li>
                <div style="width: 100%;height: 500px;background-image: url('{{url($slide->image)}}'); background-size: cover;"></div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="arrow">
        <a href="javascript:void(0)" class="btn-left"><i class="fa fa-angle-left"></i></a>
        <a href="javascript:void(0)" class="btn-right"><i class="fa fa-angle-right"></i></a>
    </div>

</div>
<div class="product">
    <div class="container">
        <div class="product-type-item">
            <br>
            <div class="row">
                <span style="font-size: 20px;">Sản phẩm mới</span>
                <p>Tìm thấy {{count($newProduct)}} sản phẩm</p>
            </div>
            <div class="row">
                @foreach($newProduct as $new)
                    <div class="col-lg-3">
                        <div class="product-tag">
                            <img src="{{url($new->image)}}">
                            <div class="bg">

                            </div>
                            <div class="product-content">

                                <p class="name">
                                    <a href="{{route('productDetail', $new->id)}}">{{$new->name}}</a>
                                </p>
                                <p class="description">
                                    <a href="{{route('productDetail', $new->id)}}">
                                        {{$new->shortDescription}}
                                    </a>
                                @if ($new->unit_price > $new->promotion_price)
                                    <div class="unit-price"><del>{{number_format($new->unit_price)}} {{$new->unit}}</del></div>
                                @endif
                                <div class="promotion-price">{{number_format($new->promotion_price)}} {{$new->unit}}</div>

                                </p>
                                <div class="emoticon">
                                    <div class="love"><a href="{{route('addToCart', $new->id)}}"><i class="fa fa-shopping-cart"></i></a></div>
                                    <div class="love fa fa-heart-o"></div>
                                    <div class="link fa fa-link"></div>
                                    <div class="share fa fa-share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$newProduct->links()}}
        </div>
        <div class="product-type-item">
            <br>
            <div class="row">
                <span style="font-size: 20px;">Sản phẩm bán chạy</span>
                <p>Tìm thấy 456 sản phẩm</p>
            </div>
            <div class="row">
                @for($i = 0; $i < 4; $i++)
                    <div class="col-lg-3">
                        <div class="product-tag">
                            <img src="{{url('assets/images/mh-1.jpg')}}">
                            <div class="bg">

                            </div>
                            <div class="product-content">

                                <p class="name">
                                    <a href="{{route('productDetail', 1)}}">Vivo Y53</a>
                                </p>
                                <p class="description">
                                    <a href="{{route('productDetail', 1)}}">
                                        "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                                    </a>
                                <p>4,567,890 VND</p>
                                </p>
                                <div class="emoticon">
                                    <div class="love fa fa-shopping-cart"></div>
                                    <div class="love fa fa-heart-o"></div>
                                    <div class="link fa fa-link"></div>
                                    <div class="share fa fa-share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>



    </div>
</div>
@endsection
@section ('script')
    <script>
        $('.banner .arrow .btn-right').click(function () {
            var currSlide = $('.slider ul li.active');

            currSlide.addClass('slideOut').on('webkitAnimationEnd', function () {
                currSlide.removeClass('active');
                currSlide.removeClass('slideOut');
            });
            if (currSlide.next().length === 0) {
                $selectSlide = $('.slider ul li:nth-child(1)');
                $selectSlide.addClass('slideIn').on('webkitAnimationEnd', function () {
                    $selectSlide.addClass('active');
                    $selectSlide.removeClass('slideIn');
                });
            }
            else {
                currSlide.next().addClass('slideIn').on('webkitAnimationEnd', function () {
                    currSlide.next().addClass('active');
                    currSlide.next().removeClass('slideIn');
                });
            }
        })
        $('.banner .arrow .btn-left').click(function () {
            var currSlide = $('.slider ul li.active');
            currSlide.addClass('slideOut').on('webkitAnimationEnd', function () {
                currSlide.removeClass('active');
                currSlide.removeClass('slideOut');
            });
            if (currSlide.prev().length === 0) {
                var selectSlide = $('.slider ul li:last-child');
                selectSlide.addClass('slideIn').on('webkitAnimationEnd', function () {
                    selectSlide.addClass('active');
                    selectSlide.removeClass('slideIn');
                });
            }
            else {
                currSlide.prev().addClass('slideIn').on('webkitAnimationEnd', function () {
                    currSlide.prev().addClass('active');
                    currSlide.prev().removeClass('slideIn');
                });
            }

        })

        setInterval(function () {
            $('.banner .arrow .btn-right')[0].click();
        }, 5000);
    </script>
@endsection