<div class="search">
    <div class="container">
        <form action="">
            <div class="row">
                <form action="{{route('pages.find')}}" method="get">
                <div class="col-sm-4 text-right">
                    <p class="shop-name">shoplux</p>
                </div>
                <div class="col-sm-8">

                        <input type="text" id="search" name="item-search" value="" placeholder="Tìm kiếm sản phẩm mong muốn...">
                        <button type="submit" id="submit-search">
                            <div class="icon fa fa-search">
                            </div>
                        </button>

                        <a class="btn-cart" href="{{route('cart')}}" style="color:#e67e22;"><i class="icon fa fa-shopping-cart"></i></a>
                </div>
                </form>
            </div>
        </form>
    </div>
</div>