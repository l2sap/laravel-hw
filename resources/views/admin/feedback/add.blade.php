@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Обратная связь:</h1> &nbsp; <strong><a href="{{ route('admin.feedback.index') }}">Список сообщений</a></strong>
    </div>

    <!-- Content Row -->
    <div>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
        @endif

        <form action="{{ route('admin.feedback.store', ['name' => 'example']) }}" method="POST">
            @csrf
            <div class="col-8">
                <div class="form-group">
                    <label for="title">Тема сообщения:</label>
                    <input type="text" name="title" class="form-control" placeholder="title" require value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="title">Ваш @email:</label>
                    <input type="email" name="email" class="form-control" placeholder="@email" require value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="title">Текст сообщения:</label>
                    <textarea class="form-control" require name="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </div>
        </form>
    </div>

</div>
@endsection