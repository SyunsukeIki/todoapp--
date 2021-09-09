<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    public function index(Request $request){
        // Todolist.php のモデルから取り出す
        $items = Todolist::all();
        // Folder.php のモデルから取り出す
        return view('todolist.index',[
            'items' => $items,
        ]);
    }

    //タスクの追加(GET)
    public function add(Request $request){
        $items = Todolist::all();
        return view('todolist.add',[
            'items' => $items
        ]);
    }
    //タスクの追加(POST)
    public function create(Request $request){
        $this->validate($request, Todolist::$rules);
        $todolist = new Todolist();
        $form = $request->all();
        unset($form['_token']);
        $todolist->fill($form)->save();
        return redirect('/folder');
    }

    // タスクの編集
    public function edit(Request $request){
        $todo = Todolist::find($request->id);
        return view('todolist.edit',['form' => $todo]);
    }

    public function update(Request $request){
        $this->validate($request, Todolist::$rules);
        $todo = Todolist::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/folder');

    }

    // タスクの削除
    public function delete(Request $request){
        $todo = Todolist::find($request->id);
        return view('todolist.del',['form' => $todo]);
    }

    public function remove(Request $request){
        Todolist::find($request->id)->delete();
        return redirect('/folder');

    }



}
