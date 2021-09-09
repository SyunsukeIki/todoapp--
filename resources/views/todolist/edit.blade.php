

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')
    <?php
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('todo/','', $current_id);
        $current = str_replace('/edit','', $cd);
    ?>

<div class = "del">
    <a href = "/todo/{{$current}}/del">削除画面へ</a>
</div>

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
                    <th>タスク名</th>
                    <td><input type="text" name="todo_name" value="{{$form->todo_name}}"></td>
                </tr>
                    <th>期日</th>
                    <td><input type="text" name="todo_due" value="{{$form->todo_due}}"></td>
                <tr>
                    <th>進行状況</th>
                    <td>
                        <label><input type="radio" name="todo_state" value="1">未着手</label>
                        <label><input type="radio" name="todo_state" value="2">進行中</label>
                        <label><input type="radio" name="todo_state" value="3">完了</label>
                    </td>
                </tr>
                    <th></th>
                    <input type="hidden" name="todo_folder" value="{{$form->todo_folder}}">
                    <td><input type="submit" value="send"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
