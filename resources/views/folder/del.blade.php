

@extends('layouts.tododelete')

@section('title','TODOAPP/delete')

@section('add')

@endsection

@section('content')
    <!-- 送信フォーム -->
    <div class = "form">
        <table>
            <form action = "/folder/{{$form->id}}/del" method="post" onSubmit="return check_message()" name="doDelete">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$form->id}}">
                <tr>
                    <th>フォルダ名</th>
                    <td>{{$form->folder_name}}</td>
                    <td><input type="submit" value="delete" id="check_message"></td>
                </tr>
            </form>
        </table>
    </div>

@endsection

@section('footer')
copyright 2021
@endsection
