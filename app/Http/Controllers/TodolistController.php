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
        $items2 = Folder::all();
        // views\todo\indexに$itemsを渡す
        return view('todolist.index',[
            'items' => $items,
            'items2' => $items2,
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
        return redirect('todo/{id}');
    }


}
