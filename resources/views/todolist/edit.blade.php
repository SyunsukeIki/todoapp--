

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

@endsection

@section('content')
    <?php
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('todo/','', $current_id);
        $current = str_replace('/edit','', $cd);
    ?>
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
            <form action = "/todo/{{$current}}/edit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>ToDoSomething</th>
                    <td><input type="text" name="todo_name" value="{{$form->todo_name}}"></td>
                </tr>
                    <th>ToDoDue</th>
                    <td><input type="text" name="todo_due" value="{{$form->todo_due}}"></td>
                <tr>
                    <th>ToDoState</th>
                    <td><input type="select" name="todo_state" value="{{$form->todo_state}}"></td>
                </tr>
                    <th></th>
                    <input type="hidden" name="todo_folder" value="{{$form->todo_folder}}">
                    <td><input type="submit" value="send"></td>
                </tr>
            </form>
            <div clas="del">
                <span><a href = "/todo/{{$current}}/del">削除する</a></span>
            </div>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
