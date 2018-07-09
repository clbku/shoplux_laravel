@extends('master')
@section ('content')
    <div class="success">

        <div class="col-sm-9 order-information">
            <div class="title">Đặt hàng thành công</div>
            <div class="underline"></div>
            <div class="description">
                Đơn hàng của bạn đã được đặt thành công. Bạn hãy giữ liên lạc để nhân viên giao hàng có thể liên hệ với bạn.
                <br><br>
            </div>
                <div class="row">
                    <button name="prev" value="submit" onclick="location.href='{{url('/')}}'">
                        <a href="{{route('homepage')}}" style="color:#fff;">Quay lại gian hàng</a>
                    </button>
                </div>
        </div>
    </div>

@endsection