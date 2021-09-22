

@extends('layouts.todoapp')
<style>
    .pagination {font-size: 15pt; padding-left: 48%;}
    .pagination li {display: inline-block;}
</style>


@section('title','TODOAPP')

@section('add')

<ul class="menu">
    <li class="menu__single">
        <a href="#" class="init-bottom">メニュー</a>
        <ul class="menu__second-level">
            <li><a href="folder/add">フォルダの追加</a></li>
            <li><a href="folder/info">フォルダの情報を見る</i></a></li>
        </ul>
    </li>
</ul>

@endsection

@section('content')
    <!-- フォルダの表示のテーブル -->
    <table>
        <tr>
            <th>フォルダ名</th>
            <th>編集</th>
        </tr>
        @foreach($page as $folderitem)
        <tr>
            <td><a href = "todo/{{$folderitem->id}}">{{$folderitem->folder_name}}</td></a>
            <td><a href = "folder/{{$folderitem->id}}/edit"><i class="fas fa-edit"></i></td>
        </tr>
        @endforeach
    </table>
    {{ $page->links()}}
@endsection

@section('footer')

@endsection
