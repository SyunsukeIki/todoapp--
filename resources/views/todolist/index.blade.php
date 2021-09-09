

@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('add')
<div class = "add">
<!-- タスクの追加 -->
<!-- 閲覧フォルダのIDの取得 -->
    <?php
        $current_id = request()->path();
        // 数字だけに変換
        $cd = str_replace('todo/', '', $current_id);
    ?>

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

        <!--関数関係 -->
        <?php
            $current_id = request()->path();
            // 数字だけに変換
            $cd = str_replace('todo/', '', $current_id);
        ?>
        <!-- 繰り返し開始 -->
        @foreach($items as $todo)
        <!-- 閲覧中のフォルダIDとタスクのフォルダIDが一致したらタスクを表示 -->
        @if($cd == $todo->todo_folder)

        <tr>
            <td>{{$todo->getName()}}</td>
            <!--
                #状態変化の表示

                1は未着手

                2は進行中

                3は完了
            -->

            @if($todo->todo_state==1)
            <td>未着手</td>
            @elseif($todo->todo_state==2)
            <td>進行中</td>
            @else($todo->todo_state==3)
            <td>完了</td>
            @endif

            <!-- 期日の表示 -->
            <td>{{$todo->todo_due}}</td>

            <td>編集画面へ</td>
        </tr>
        <!-- 追加の文言は一回だけ表示する -->
        @elseif($loop->index == 0)
        <div class ="message">+ToDoでタスクを追加してください</div>
        @endif
        @endforeach
        <!-- 繰り返し終了 -->

    </table>
@endsection



@section('footer')
copyright 2021
@endsection
