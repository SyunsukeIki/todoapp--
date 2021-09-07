

@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('add')
<div class = "add">
<a href = "/add">+ToDo</a>
</div>
@endsection

@section('content')
    <table>
        <tr>
            <th>タスク名</th>
            <th>編集</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>編集画面へ</td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2021
@endsection
