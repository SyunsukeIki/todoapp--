

@extends('layouts.tododelete')

@section('title','TODOAPP/delete')

@section('add')

@endsection

@section('content')
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            <form action = "/todo/{{$form->id}}/del" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>タスク名</th>
                    <td>{{$form->todo_name}}</td>
                </tr>
                    <th>期日</th>
                    <td>{{$form->todo_due}}</td>
                <tr>
                    <th>状態</th>
                    @if($form->todo_state == 1)
                    <td>未着手</td>
                    @elseif($form->todo_state == 2)
                    <td>進行中</td>
                    @else
                    <td>完了</td>
                    @endif
                </tr>
                    <th></th>
                    <!-- 閲覧中のフォルダのIDを自動的に挿入 -->
                    <input type="hidden" name="todo_folder"
                    value="{{$form->todo_folder}}">
                    <td><input type="submit" value="delete"　onclick="deleteMessage()"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021　
@endsection
