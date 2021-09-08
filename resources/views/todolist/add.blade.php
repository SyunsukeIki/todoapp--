

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

@endsection

@section('content')
    <!-- バリデーションメッセージ -->
    @if (count($errors)>0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            @foreach($items as $item)
            <form action = "/todo/{{$item->getID()}}/add" method="post">
                {{csrf_field()}}
                <tr>
                    <th>新規タスク</th>
                    <td><input type="text" name="todo_name" value="{{old('todo_name')}}"></td>
                    <th>タスク期日</th>
                    <td><input type="text" name="todo_due" value="{{old('todo_due')}}"></td>
                    <td><input type="submit" value="send"></td>
                </tr>
            @endforeach
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
