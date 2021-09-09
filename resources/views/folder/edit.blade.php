

@extends('layouts.todoappform')

@section('title','ToDoApp')

@section('add')
    <?php
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('folder/','', $current_id);
        $current = str_replace('/edit','', $cd);
    ?>

<div class = "del">
<a href = "/folder/{{$current}}/del">削除画面へ</a>
</div>

@endsection

@section('content')
    <?php
        $current_id = request()->path();
        // 数字だけ欲しいから、数字の前後を二回に分けてトリミング
        $cd = str_replace('folder/','', $current_id);
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
            <form action = "/folder/{{$current}}/edit" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>フォルダ名</th>
                    <td><input type="text" name="folder_name" value="{{$form->folder_name}}"></td>
                    <td><input type="submit" value="send"></td>
                </tr>
            </form>
        </table>

    </div>

@endsection

@section('footer')
copyright 2021
@endsection
