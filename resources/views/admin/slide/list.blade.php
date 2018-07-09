@extends('admin.master')
@section('content')
    <section id="content">
        <div class="card">
            <div class="card__header">
                <h2>Danh sách slide</h2>
                <br>
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
                            <th>Slide</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slide as $pt)
                            <tr>
                                <td>{{$pt->id}}</td>
                                <td><img src="{{url($pt->image)}}" style="width: 400px;"></td>
                                <td width="10%">
                                    <a href="{{route('admin.slide.delete', $pt->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="" id="show-add-slide">
                            <td colspan="3">
                                <form action="{{route('admin.slide.post.add')}}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <h3>Thêm slide</h3>
                                    <div class="form-group">
                                        <input type="file" class="form-control input-sm" name="slide">
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <button class="btn btn--light btn--icon-text" type="submit"><i class="zmdi zmdi-check"></i> Check</button>
                                </form>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


