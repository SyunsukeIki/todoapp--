<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{

    // 一覧の表示
    public function index(Request $request){
        // todolist.php のモデルから取り出す
        $todoitems = Todolist::all();
        $todo = Todolist::find($request->id);
        return view('todolist.index',['todoitems' => $todoitems , 'form' => $todo,]);
    }

    //タスクの追加(GET)
    public function add(Request $request)
    {
        return view('todolist.add');
    }
    //タスクの追加(POST)
    public function create(Request $request)
    {
        // バリデーション
        $this->validate($request, Todolist::$rules);
        $todolist = new Todolist();
        $form = $request->all();
        unset($form['_token']);
        $todolist->fill($form)->save();
        return redirect('/folder');
    }

    // タスクの編集
    public function edit(Request $request)
    {
        $todo = Todolist::find($request->id);
        return view('todolist.edit',['form' => $todo]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $todo = Todolist::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/folder');

    }

    // タスクの削除
    public function delete(Request $request)
    {
        $todo = Todolist::find($request->id);
        return view('todolist.del',['form' => $todo]);
    }

    public function remove(Request $request)
    {
        Todolist::find($request->id)->delete();
        return redirect('/folder');

    }



}
