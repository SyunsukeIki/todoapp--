

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

@endsection

@section('content')
    <?php
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('todo/','', $current_id);
        $current = str_replace('/del','', $cd);
    ?>
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            <form action = "/todo/{{$current}}/del" method="post">
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
                    <input type="hidden" name="todo_folder" value="{{$form->todo_folder}}">
                    <td><input type="submit" value="delete"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
