@extends ('master');
@section ('content')
    <div class="login">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form method="post" action="{{route('post-add-user')}}">
                    {!! csrf_field() !!}
                    <h3>Đăng Ký</h3>
                    <hr>
                    <div class="form-group">
                        <label>Tên người dùng</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="radio" name="gender" value="Nam" checked="checked"> Nam
                        <input type="radio" name="gender" value="Nữ" > Nữ
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" name="re-password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <input type="submit" class="btn btn-success" value="Tạo tài khoản">
                </form>
            </div>
        </div>
    </div>
@endsection