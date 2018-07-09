@extends('admin.master')
@section('content')
    <section id="content">

        <div class="card">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @endif
            <div class="card__header">
                <h2>Thêm tin tức mới</h2>
            </div>

            <div class="card__body">

                <form action="{{route('admin.news.post.add')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <p>Tiêu đề</p>
                        <input type="text" class="form-control input-sm" name="title" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Nội dung</p>
                        <textarea id="ck-description" name="news_content" required></textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <div class="form-group">
                        <p>Chi tiết</p>
                        <textarea id="ck-tech" name="detail" required></textarea>
                        <i class="form-group__bar"></i>
                    </div>
                    <script>
                        CKEDITOR.replace('ck-description');
                        CKEDITOR.replace('ck-tech');
                    </script>

                    <div class="form-group">
                        <p>Hình minh họa</p>
                        <input type="file" class="form-control input-sm" name="image" required>
                        <i class="form-group__bar"></i>
                    </div>
                    <button class="btn btn--light btn--icon-text" type="submit"><i class="zmdi zmdi-check"></i> Check</button>
                </form>
            </div>
        </div>

    </section>
@endsection