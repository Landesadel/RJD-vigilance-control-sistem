@extends('main')
@section('content')
    <div class="d-flex mt-5 justify-content-around">
        <ol>
            @forelse ($userList as $user)
                <li>
                    <a href="#">{{$user->last_name}} {{$user->name}} {{$user->second_name}}</a>
                </li>
            @empty
                <span class="lead">В данной бригаде ещё нет записей о сотрудниках</span>
            @endforelse
        </ol>
        <div>
            <h3>Общая статистика бригады</h3>
        </div>
    </div>
@endsection
