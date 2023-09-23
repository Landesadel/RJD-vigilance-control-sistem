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
        <form method="post" action="{{url(\App\Classes\Helpers::getHost() . '/users')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="crew">Бригада*</label>
                <select id="crew" name="crew_id" class="form-control @error('crew_id') is-invalid @enderror">
                    <option value="0">->Выбрать<-</option>
                    @foreach($crews as $crew)
                        <option @if(old('crew_id') === $crew) selected @endif value="{{ $crew->id }}">{{ $crew->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="role_id">Должность сотрудника*</label>
                <input type="text" id="role_id" name="role_id" value="Машинист" class="form-control @error('role') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="last_name">Фамилия*</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="name">Имя*</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="second_name">Отчество*</label>
                <input type="text" id="second_name" name="second_name" value="{{ old('second_name') }}" class="form-control @error('second_name') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="is_assistant">Есть помощник</label>
                <input class="form-check" id="is_assistant" value="old('is_assistant')" type="checkbox" onchange="toggleFields()">
            </div>
            <div id="additionalFields" style="display: none;">
                <div class="form-group mt-2">
                    <label for="assistant_last_name">Фамилия помощника</label>
                    <input type="text" id="assistant_last_name" name="assistant_last_name" value="{{ old('assistant_last_name') }}" class="form-control @error('assistant_last_name') is-invalid @enderror">
                </div>
                <div class="form-group mt-2">
                    <label for="assistant_name">Имя помощника</label>
                    <input type="text" id="assistant_name" name="assistant_name" value="{{ old('assistant_name') }}" class="form-control @error('assistant_name') is-invalid @enderror">
                </div>
                <div class="form-group mt-2">
                    <label for="assistant_second_name">Отчество помощника</label>
                    <input type="text" id="assistant_second_name" name="assistant_second_name" value="{{ old('assistant_second_name') }}" class="form-control @error('assistant_second_name') is-invalid @enderror">
                </div>
            </div>
           <div class="form-group mt-2">  {{-- todo доделать--}}
                <label for="file">json-файл*</label>
                <input type="file" id="file" name="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-sm mt-3 btn-outline-secondary">Загрузить+</button>
        </form>
    </div>
@endsection

@push("js")
    <script type="text/javascript">
        function toggleFields() {
            let additionalFields = document.getElementById('additionalFields');
            let checkbox = document.getElementById('is_assistant');

            if (checkbox.checked) {
                additionalFields.style.display = 'block';
            } else {
                additionalFields.style.display = 'none';
            }
        }
    </script>
@endpush
