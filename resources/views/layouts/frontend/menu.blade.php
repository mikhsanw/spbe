<li class="nav-item">
    @if($data->children->count() > 0 && $data->status != 4)
    <a class="nav-link" href="{{url('#')}}">{{$data->nama}}</a>
    <ul class="dropdown-menu">
        @foreach($data->children as $sub)
            @include('layouts.frontend.menu', ['data'=>$sub])
        @endforeach
    </ul>
    @else
        @if($data->status==2)
        <a class="nav-link" href="{{$data->link}}">{{$data->nama}}</a>
        @else
        <a class="nav-link" href="{{url('/company/page/'.$data->id.'/'.Help::generateSeoURL($data->nama))}}">{{$data->nama}}</a>
        @endif

    @endif
</li>