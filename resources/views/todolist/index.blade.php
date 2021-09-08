

@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('add')
<div class = "add">

@foreach($items as $item)
<a href = "/todo/{{$item->getID()}}/add">+ToDo</a>
@endforeach

</div>
@endsection


@section('content')
    <table>
        <tr>
            <th>タスク名</th>
            <th>状態</th>
            <th>期日</th>
            <th>編集</th>
        </tr>


        <!-- 閲覧フォルダのIDの表取得 -->
        <?php
        $current_id = request()->path();
        // 数字だけを取得
        $cd = str_replace('todo/', '', $current_id);
        ?>


        <!-- itemsはtodolistから -->
        @foreach($items as $item)
        <!--items2はFolderから  -->
        @foreach($items2 as $item2)

        <!-- 閲覧中のフォルダIDと一致するタスクを表示 -->
        @if($item->todo_folder == $cd)

        <tr>
            <td>{{$item->getName()}}</td>
            @if($item->folders != null)
                <table width="100%">
                    @foreach($item->folders as $obj)
                        <tr>
                            <td>{{$obj->getName()}}</td>
                        </tr>
                    @endforeach
            @endif

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
        <td>タスクを追加してください</td>
        @endif
        @endforeach
        @endforeach

    </table>
@endsection



@section('footer')
copyright 2021
@endsection
