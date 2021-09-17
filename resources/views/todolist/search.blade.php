

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

@endsection

@section('content')
    <?php
        $current_id = request()->path();
        // 数字だけに変換
        $cd_todo = str_replace('todo/', '', $current_id);
        $cd_done = str_replace('/done', '', $cd_todo);
        $cd = str_replace('/search', '', $cd_done);
    ?>
    <div>
    <!-- 送信フォーム -->
    <table>
    <div class = "form">
        <form action = "/todo/{{$cd}}/done/search" method="post">
            {{csrf_field()}}
            <tr>
                <th>検索</th>
                <td>
                <select name="input">
                    @foreach($todoitems as $todoitem)
                        <option value="{{$todoitem->todo_name}}"
                            label = "{{$todoitem->todo_name}}">
                        </option>
                    @endforeach
                    </select>
                </td>
                <td>
                    <input type="submit" value="find">
                </td>
            </tr>
        </form>
    </div>
    </table>
    @if(isset($search))
        <table>
            <tr>
                <th>タスク名</th>
                <th>タスク作成日</th>
                <th>タスク完了日</th>
            </tr>
            <tr>
                <td>{{$search->getName()}}</td>
                <td>{{$search->getDate()}}</td>
                <td>{{$search->getDone()}}</td>
            </tr>
        </table>
    @endif
    </div>
@endsection

@section('footer')
copyright 2021
@endsection
