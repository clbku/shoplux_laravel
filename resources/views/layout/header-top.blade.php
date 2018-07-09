<div class="navbar">
    <div class="container">
        <div class="nav">
            <ul>
                {{--<li>Tải app</li>--}}
                {{--<li>Bán hàng cùng shoplux</li>--}}
                {{--<li>Chăm sóc khách hàng</li>--}}
                <li>Kiểm tra dơn hàng</li>
                @if (Auth::user())
                    <li>
                        Xin chào, {{Auth::user()->name}}
                    </li>
                    <li><a href="{{route('sign-out')}}">Đăng xuất</a></li>
                @else
                    <li><a href="{{route('sign-in')}}">Đăng nhập</a></li>
                    <li><a href="{{route('sign-up')}}">Đăng ký</a></li>
                @endif
            </ul>
        </div>
    </div>

</div>