@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Загрузить данные сотрудника</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{url(\App\Classes\Helpers::getHost() . '/')}}" class="btn btn-sm btn-outline-secondary">Назад</a>
                <button class="btn btn-sm btn-outline-secondary">#</button>
            </div>
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{url(\App\Classes\Helpers::getHost() . '/users')}}">
            @csrf
            <div class="form-group mt-2">
                <label for="role">Должность</label>
                <select id="role" name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                    <option value="0">->Выбрать<-</option>
                    @foreach($roles as $role)
                        <option @if(old('role_id') === $role) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="crew">Бригада</label>
                <select id="crew" name="crew_id" class="form-control @error('crew_id') is-invalid @enderror">
                    <option value="0">->Выбрать<-</option>
                    @foreach($crews as $crew)
                        <option @if(old('crew_id') === $crew) selected @endif value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="last_name">Фамилия</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="second_name">Отчество</label>
                <input type="text" id="second_name" name="second_name" value="{{ old('second_name') }}" class="form-control @error('second_name') is-invalid @enderror">
            </div>
           <div class="form-group mt-2">  {{-- todo доделать--}}
                <label for="video">Видео-файл</label>
                <input type="file" id="video" name="video[]" value="{{ old('video') }}" class="form-control @error('video') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-sm mt-3 btn-outline-secondary">Загрузить+</button>
        </form>
    </div>
@endsection
