@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1> &nbsp; <strong><a href="{{ route('admin.categories.index') }}">Список категорий</a></strong>
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

        <form action="{{ route('admin.categories.store', ['name' => 'example']) }}" method="POST">
            @csrf
            <div class="col-8">
                <div class="form-group">
                    <label for="title">Наименование категории</label>
                    <input type="text" name="title" class="form-control" placeholder="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Описание категории</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>

</div>
@endsection

@push('js')
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush