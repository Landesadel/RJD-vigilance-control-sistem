@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mt-3 mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{url(\App\Classes\Helpers::getHost() . '/')}}" class="btn btn-sm btn-outline-secondary">Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 justify-content-around">
        <ol class="list-unstyled">
            @forelse ($crewList as $crew)
                <li class="nav-item mb-3">
                    <a href="{{url(\App\Classes\Helpers::getHost() . '/crews/' . $crew->id)}}" class="btn btn-sm btn-outline-secondary"><h3>{{$crew->name}}</h3></a>
                </li>
            @empty
                <span class="lead">На данный момент нет записи о бригадах</span>
            @endforelse
        </ol>
    </div>
@endsection
