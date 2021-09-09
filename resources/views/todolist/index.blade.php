

@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('add')
<div class = "add">
<!-- タスクの追加 -->
@foreach($items as $item)
<a href = "/todo/{{$item->getID()}}/add">+ToDo</a>
@endforeach

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
        <!-- 閲覧フォルダのIDの取得 -->
        <?php
        $current_id = request()->path();
        // 数字だけに変換
        $cd = str_replace('todo/', '', $current_id);
        ?>
        <!-- itemsはTodolistから -->
        @foreach($items as $item)
        <!--items2はFolderから  -->


        <!-- 閲覧中のフォルダIDとタスクのフォルダIDが一致したらタスクを表示 -->
        @if($item->todo_folder == $cd)

        <tr>
            <td>{{$item->getName()}}</td>
            <!--
                #状態変化の表示

                1は未着手

                2は進行中

                3は完了
            -->

            @if($item->todo_state==1)
            <td>未着手</td>
            @elseif($item->todo_state==2)
            <td>進行中</td>
            @else($item->todo_state==3)
            <td>完了</td>
            @endif

            <!-- 期日の表示 -->
            <td>{{$item->todo_due}}</td>

            <td>編集画面へ</td>
        </tr>
        @else
        <div class ="message">+ToDoでタスクを追加してください</div>
        @endif
        @endforeach

    </table>
@endsection



@section('footer')
copyright 2021
@endsection
