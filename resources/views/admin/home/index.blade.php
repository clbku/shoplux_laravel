@extends('admin.master')
@section('content')
<section id="content">
    <div class="box">
        <div id="content__grid">
            {{--<div class="card-1 widget-analytic">--}}
                {{--<div class="card__header">--}}
                    {{--<h2>Tổng số hãng</h2>--}}
                {{--</div>--}}
                {{--<div class="card__body">--}}
                    {{--<div class="widget-analytic__info">--}}
                        {{--<h2>{{DB::select('select count(*) as num from company where status = 0')[0]->num}}</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

            <div class="card-1 widget-analytic">
                <div class="card__header">
                    <h2>Số loại sản phẩm</h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>{{DB::select('select count(*) as num from categories')[0]->num}}</h2>
                    </div>
                </div>
            </div>
            <div class="card-1 widget-analytic">
                <div class="card__header">
                    <h2>Số sản phẩm</h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>{{DB::select('select count(*) as num from products where status = 0')[0]->num}}</h2>
                    </div>
                </div>

            </div>

            <div class="card-1 widget-analytic">
                <div class="card__header">
                    <h2>Số người dùng</h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>{{DB::select('select count(*) as num from users where status = "Hoạt động"')[0]->num}}</h2>
                    </div>
                </div>
            </div>

        </div>
        <div id="content__grid">
            <div class="card-1 widget-analytic">
                <div class="card__header">
                    <h2>Số khách hàng</h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>{{DB::select('select count(distinct email) as num from customers')[0]->num}}</h2>
                    </div>
                </div>

            </div>

            <div class="card-1 widget-analytic">
                <div class="card__header">
                    <h2>Số đơn hàng</h2>
                </div>
                <div class="card__body">
                    <div class="widget-analytic__info">
                        <h2>{{DB::select('select count(*) as num from bills')[0]->num}}</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
@endsection