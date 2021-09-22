

@extends('layouts.todoappform')

@section('title','TODOAPP/delete')

@section('add')

@endsection

@section('content')
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            <form action = "/folder/{{$form->id}}/del" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>フォルダ名</th>
                    <td>{{$form->folder_name}}</td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="delete"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
