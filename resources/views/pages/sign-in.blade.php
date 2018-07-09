@extends ('master');
@section ('content')
    <div class="login">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form method="post">
                    {!! csrf_field() !!}
                    <h3>Đăng nhập</h3>
                    <hr>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success" value="Đăng nhập">
                </form>
            </div>
        </div>
    </div>
@endsection