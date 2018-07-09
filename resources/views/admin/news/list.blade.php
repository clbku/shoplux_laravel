@extends('admin.master')
@section('content')
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>Danh sách tin tức</h2>
                <br>
                <form class="top-search" method="post" action="{{route('admin.news.find')}}">
                    {!! csrf_field() !!}
                    <input type="text" class="top-search__input" name="keyword" placeholder="Tìm kiếm">
                    <i class="zmdi zmdi-search top-search__reset"></i>
                </form>
            </div>
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('success')}}</div>
            @elseif (\Illuminate\Support\Facades\Session::has('wrong'))
                <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('wrong')}}</div>
            @endif
            <div class="card__body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $n)
                            <tr>
                                <td>{{$n->id}}</td>
                                <td width="30%">{!! $n->title !!}</td>
                                <td>{!! $n->content !!}</td>
                                <td width="10%">{{$n->image}}</td>
                                <td width="10%">
                                    <a href="{{route('admin.news.edit', $n->id)}}"><i class="fa fa-edit"></i></a>
                                    {{--<a href="{{route('admin.news.listProduct', $n->id)}}"><i class="fa fa-list"></i></a>--}}
                                    <a href="{{route('admin.news.delete', $n->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">
                                <a class="btn btn-success" href="{{route('admin.news.add')}}">Thêm tin tức</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


