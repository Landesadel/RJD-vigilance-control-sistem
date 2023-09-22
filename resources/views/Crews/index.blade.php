@extends('main')
@section('content')
    <div class="d-flex mt-5 justify-content-around">
        <ol>
            @forelse ($crewList as $crew)
                <li>
                    <a href="#"><h3>{{$crew->name}}</h3></a>
                </li>
            @empty
                <span class="lead">На данный момент нет записи о бригадах</span>
            @endforelse
        </ol>
    </div>
@endsection
