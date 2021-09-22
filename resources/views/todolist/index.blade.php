@extends('layouts.todoapp')

<style>
    .pagination {font-size: 15pt; padding-left: 47%;}
    .pagination li {display: inline-block;}
</style>


@section('title','TODOAPP')

@section('add')

<!-- 閲覧フォルダのIDの取得 -->
    <?php
        $current_id = request()->path();
        // 数字だけに変換
        $cd = str_replace('todo/', '', $current_id);
    ?>
    <ul class="menu">
        <li class="menu__single">
            <a href="#" class="init-bottom">メニュー</a>
            <ul class="menu__second-level">
                <li><a href="/todo/{{$cd}}/add">タスクの追加</i></a></li>
                <li><a href="/todo/{{$cd}}/done">完了済みタスク</a></li>
            </ul>
        </li>
    </ul>


@endsection

<!-- メインのテーブル -->
@section('content')
     <!--変数 -->
    <?php
        // 現在のURLの取得
        $current_id = request()->path();
        // 数字(閲覧中のフォルダID)だけに変換
        $cd = str_replace('todo/', '', $current_id);
    ?>
    <table>
        <!-- 見出し -->
        <tr>
            <th>タスク名</th>
            <th>状態</th>
            <th>期日</th>
            <th>編集</th>
        </tr>
        @foreach($todolist as $todoitem)
        @if($cd == $todoitem->todo_folder && $todoitem->todo_state<>3)
        <tr>
            <td>{{$todoitem->todo_name}}</td>

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
            <td><a href = "{{$todoitem->id}}/edit">   <i class="fas fa-edit"></i></td></a>
        </tr>
        @elseif($loop->index == 0)
        <div class ="message">メニューから「タスクの追加」をしてください</div>
        @endif
        @endforeach
    </table>


@endsection

@section('footer')
copyright 2021
@endsection
