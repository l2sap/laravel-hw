@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список сообщений</h1> &nbsp; <strong><a href="{{ route('admin.feedback.create') }}">Написать сообщение</a></strong>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Тема сообщения</th>
                    <th>@email</th>
                    <th>Текст сообщения</th>
                    <th>Дата добавления</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{$feedback->title}}</td>
                    <td>{{$feedback->email}}</td>
                    <td>{{$feedback->description}}</td>
                    <td>{{$feedback->created_at}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <h2>Сообщений нет</h2>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection