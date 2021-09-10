

@extends('layouts.todoapp')


@section('title','ToDoApp')

@section('add')
<!-- フォルダの追加 -->
<div class = "add">
<a href = "folder/add">+folder</a>
</div>
@endsection

@section('content')
    <!-- フォルダの表示のテーブル -->
    <table>
        <tr>
            <th>フォルダ名</th>
            <th>編集</th>
        </tr>
        @foreach($folderitems as $folderitem)
        <tr>
            <td><a href = "todo/{{$folderitem->getId()}}">{{$folderitem->getName()}}</td></a>
            <td><a href = "folder/{{$folderitem->getId()}}/edit">編集画面へ</td>
        </tr>
        @endforeach
    </table>

@endsection

@section('footer')
copyright 2021
@endsection
