@extends ('master')
@section ('content')
    @include ('layout.flitter')
    <div class="product">
        <div class="container">
            <div class="product-type-item">
                <br>
                <div class="row">
                    <span style="font-size: 20px;">{{$name}}</span><br>
                    <span>Tìm thấy {{count($products)}} sản phẩm</span>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3">
                            <div class="product-tag">
                                <img src="{{url($product->image)}}">
                                <div class="bg">

                                </div>
                                <div class="product-content">

                                    <p class="name">
                                        <a href="{{route('productDetail', 1)}}">{{$product->name}}</a>
                                    </p>
                                    <p class="description">
                                        <a href="{{route('productDetail', 1)}}">
                                            {{$product->shortDescription}}
                                        </a>  </p>
                                    <div class="emoticon">
                                        <div class="love"><a href="{{route('addToCart', $product->id)}}"><i class="fa fa-shopping-cart"></i></a></div>
                                        <div class="love fa fa-heart-o"></div>
                                        <div class="link fa fa-link"></div>
                                        <div class="share fa fa-share"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product-type-item">
                <br>
                <div class="row">
                    <span style="font-size: 20px;">Sản phẩm bán chạy</span>
                    <span>Tìm thấy 500 sản phẩm</span>
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
                                            "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."
                                        </a>  </p>
                                    <div class="emoticon">
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