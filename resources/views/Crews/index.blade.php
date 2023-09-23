@extends('main')
@section('content')
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
