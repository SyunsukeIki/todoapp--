@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')

    <!--削除画面へのリンク  -->
    <div class = "del">
        <a href = "/todo/{{$form->id}}/del">削除画面へ</a>
    </div>

@endsection

@section('content')
    <!-- バリデーションメッセージの表示 -->
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
            <form action = "/todo/{{$form->id}}/edit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>タスク名</th>
                    <td>
                        <input type="text" name="todo_name"
                        value="{{$form->todo_name}}">
                    </td>
                </tr>
                    <th>期日</th>
                    <td>
                        <!-- 入力形式を統一させるためにinput type = "date"を採用 -->
                        <input type="date" name="todo_due"
                         value="{{$form->todo_due}}">
                    </td>
                <tr>
                    <th>進行状況</th>
                    <td>
                        <!-- 1,2,3以外を選ばせないようにラジオボタン形式 -->
                        <label>
                            <input type="radio" name="todo_state" value="1">未着手
                        </label>
                        <label>
                            <input type="radio" name="todo_state" value="2">進行中
                        </label>
                        <label>
                            <input type="radio" name="todo_state" value="3">完了
                        </label>
                    </td>
                </tr>
                    <th></th>
                    <td>
                        <!-- 閲覧中のフォルダのIDを自動的に挿入 -->
                        <input type="hidden" name="todo_folder"
                        value="{{$form->todo_folder}}">
                        <!-- 送信ボタン -->

                        <input type="submit" value="send">
                    </td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
