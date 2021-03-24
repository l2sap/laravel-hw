@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список новостей</h1> &nbsp; <strong><a href="{{ route('admin.news.index') }}">Список категорий</a></strong>
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

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-8">
                <div class="form-group">
                    <label for="title">Выбор категории</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option>Выбрать</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Заголовок новости</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="description">Описание новости</label>
                    <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="title">Изображение новости</label>
                    <input class="form-control" id="image" name="image" type="file">
                </div>
                <div class="form-group">
                    <label for="title">Статус новости</label>
                    <select class="form-control" name="status" id="status">
                        <option>Выбрать</option>
                        <option value="draft">draft</option>
                        <option value="published">published</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>

</div>
@endsection