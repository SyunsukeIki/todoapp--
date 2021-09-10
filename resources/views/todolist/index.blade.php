@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('add')
<div class = "add">
<!-- 閲覧フォルダのIDの取得 -->
    <?php
        $current_id = request()->path();
        // 数字だけに変換
        $cd = str_replace('todo/', '', $current_id);
    ?>
<!-- タスクの追加 -->
<a href = "/todo/{{$cd}}/add">+ToDo</a>

</div>
@endsection

<!-- メインのテーブル -->
@section('content')
    <table>
        <!-- 見出し -->
        <tr>
            <th>タスク名</th>
            <th>状態</th>
            <th>期日</th>
            <th>編集</th>
        </tr>

        <!--変数 -->
        <?php
            // 現在のURLの取得
            $current_id = request()->path();
            // 数字(閲覧中のフォルダID)だけに変換
            $cd = str_replace('todo/', '', $current_id);
        ?>
        <!-- 繰り返し開始 -->
        @foreach($todoitems as $todoitem)
        @if($cd == $todoitem->todo_folder)
        <tr>
            <td>{{$todoitem->getName()}}</td>

            <!--
                #状態変化の表示

                1は未着手

                2は進行中

                3は完了
            -->
            @if($todoitem->todo_state==1)
            <td class="start">
                未着手
            </td>
            @elseif($todoitem->todo_state==2)
            <td class="ing">
                進行中
            </td>
            @else($todoitem->todo_state==3)
            <td class="done">完了</td>
            @endif

            <!-- 期日の表示 -->
            <td>{{$todoitem->todo_due}}</td>
            <!-- todolistsのidを取得、編集画面へ -->
            <td><a href = "{{$todoitem->id}}/edit">編集画面</td></a>
        </tr>
        @elseif($loop->index == 0)
        <div class ="message">+ToDoでタスクを追加してください</div>
        @endif
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2021
@endsection
