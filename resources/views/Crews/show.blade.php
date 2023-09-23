@extends('main')
@section('content')
    <div class="d-flex mt-5 justify-content-around">
        <div class="d-flex flex-column">
            <h2>{{$crew->name}}</h2>
            <ul class="nav d-flex align-items-start flex-lg-column">
                @forelse ($userList as $user)
                    <li class="nav-item mb-2 d-flex align-items-center">
                        <a href="{{url(\App\Classes\Helpers::getHost() . '/users/' . $user->id)}}" class="nav-link link-dark" style="font-size: large">{{$user->last_name}} {{$user->name}} {{$user->second_name}}</a>
                        <p class="mt-3">{{($user->role)->name}}</p>
                    </li>
                @empty
                    <span class="lead mt-3">В данной бригаде ещё нет записей о сотрудниках</span>
                @endforelse
            </ul>
        </div>
        <div>
            <h3>Общая статистика нарушений бригады</h3>
        </div>
    </div>
@endsection
