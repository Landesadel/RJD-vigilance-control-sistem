@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mt-3 mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{url(\App\Classes\Helpers::getHost() . '/crews')}}" class="btn btn-sm btn-outline-secondary">Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 flex-column">
        <div class="d-flex flex-column">
            <h4>{{ ($user->crew)->name }}</h4>
            <div class="nav d-flex align-items-start justify-content-center">
                    <p class="font-weight-light mx-3" style="font-size: large">{{$user->last_name}} {{$user->name}} {{$user->second_name}}</h4>
                    <p class="mt-1">{{($user->role)->name}}</p>
            </div>
        </div>
    <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mt-3 mb-2 mb-md-0">
            <div class="btn-group mr-2 d-flex justify-content-end align-items-end">
                <h4>Cтатистика по нарушениям сотрудника</h4>
            </div>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Дата фиксации нарушения</th>
                    <th scope="col">Время фиксации нарушения</th>
                    <th scope="col">Минута на видео-записи</th>
                    <th scope="col">Тип нарушения</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($distList as $dist)
                    <tr>
                        <td>{{ $dist->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($dist->date)->format('d.m.Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($dist->time_start)->format('H:i:s') }}</td>
                        <td>{{ $dist->video_time }}</td>
                        <td>{{
                            ($dist->type === 'phone')
                                ? 'Пользование телефоном'
                                : (($dist->type === 'empty_place')
                                    ? 'Отсутствие бригады на месте'
                                    : 'Отвлекался')
                        }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Нарушений за загруженный период - нет</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
    {{ $distList->render() }}
@endsection
