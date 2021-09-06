

@extends('layouts.todoapp')

@section('title','ToDoApp')

@section('header')

@show

@section('content')

    <div class = "tableContents">
        <table>
            <tr>
                <th>フォルダ名</th>
                <th>編集</th>
            </tr>
            @foreach($items as $item)
             <tr>
                <td>{{$item->folder_name}}</td>
                <td>編集画面へ</td>
            </tr>
            @endforeach
    </table>
    </div>
@endsection

@section('footer')
copyright 2021
@endsection
