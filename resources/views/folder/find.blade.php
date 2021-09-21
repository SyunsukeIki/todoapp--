

@extends('layouts.todoappform')

@section('title','TODOAPP/info')

@section('add')

@endsection

@section('content')
    <div>
    <!-- 送信フォーム -->
    <table>
    <div class = "form">
        <form action = "/folder/info" method="post">
            {{csrf_field()}}
            <tr>
                <th>検索</th>
                <td>
                    <select name="input">
                    @foreach($folderitems as $folderitem)
                        <option value="{{$folderitem->folder_name}}"
                            label = "{{$folderitem->folder_name}}">
                        </option>
                    @endforeach
                    </select>
                </td>
                <td>
                    <input type="submit" value="find">
                </td>
            </tr>
        </form>
    </div>
    </table>
    @if(isset($search))
        <table>
            <tr>
                <th>フォルダ名</th>
                <th>フォルダ作成日</th>
            </tr>
            <tr>
                <td>{{$search->getName()}}</td>
                <td>{{$search->getDate()}}</td>
            </tr>
        </table>
    @endif
    </div>
@endsection

@section('footer')
copyright 2021
@endsection
