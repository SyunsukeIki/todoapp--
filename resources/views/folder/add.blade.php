

@extends('layouts.todoappform')

@section('title','TODOAPP/add')

@section('add')

@endsection

@section('content')
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
            <form action = "/folder/add" method="post">
                {{csrf_field()}}
                <tr>
                    <th>新規フォルダ名</th>
                    <td>
                        <input type="text" name="folder_name"
                         value="{{old('folder_name')}}">
                    </td>
                    <td>
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
