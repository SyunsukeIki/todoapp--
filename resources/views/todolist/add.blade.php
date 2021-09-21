

@extends('layouts.todoappform')

@section('title','TODOAPP/add')

@section('add')

@endsection

@section('content')
    <!-- 閲覧フォルダのIDの取得 -->
    <?php
        //現在のURL
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('todo/','', $current_id);
        $current = str_replace('/add','', $cd);
        $today = date('Y年m月d日');
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
            <form action = "/todo/{{$current}}/add" method="post">
                {{csrf_field()}}
                <tr>
                    <th>新規タスク</th>
                    <td>
                        <input type="text" name="todo_name"
                        value="{{old('todo_name')}}">
                    </td>
                </tr>
                    <th>タスク期日</th>
                    <td>
                        <!-- 入力形式を統一させるためにinput type = "date"を採用 -->
                        <input type="date" min="{{$today}}}" name="todo_due"
                        value="{{old('todo_due')}}">
                    </td>
                <tr>
                    <th></th>
                    <!-- 閲覧中のフォルダのIDを自動的に挿入 -->
                    <input type="hidden" name="todo_folder" value="{{$current}}">
                    <td><input type="submit" value="send"></td>
                </tr>

            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
