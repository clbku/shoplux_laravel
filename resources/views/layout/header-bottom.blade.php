<div class="category">
    <div class="container">
        <ul>
            <li class="active"><a href="{{route('homepage')}}"><i class=" fa fa-home"></i></a></li>
            @foreach($category as $c)
                @if ($c->cate_parent == null)
                    <li style="position: relative;">
                        {{$c->name}}
                        <ul class="sub-menu">
                            @foreach($category as $c2)
                                @if ($c2->cate_parent == $c->id)
                                <li><a href="{{route('pages.product', $c2->id)}}">{{$c2->name}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

        </ul>

    </div>
</div>