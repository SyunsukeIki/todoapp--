

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

@endsection

@section('content')
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            <form action = "/todo/{{$form->id}}/del" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>ToDoSomething</th>
                    <td>{{$form->todo_name}}</td>
                </tr>
                    <th>ToDoDue</th>
                    <td>{{$form->todo_due}}</td>
                <tr>
                    <th>ToDoState</th>
                    <td>{{$form->todo_state}}</td>
                </tr>
                    <th></th>
                    <!-- 閲覧中のフォルダのIDを自動的に挿入 -->
                    <input type="hidden" name="todo_folder"
                    value="{{$form->todo_folder}}">
                    <td><input type="submit" value="delete"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021　
@endsection
