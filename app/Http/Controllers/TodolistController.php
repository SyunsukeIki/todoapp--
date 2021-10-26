<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;

class TodolistController extends Controller
{

    // 一覧表示
    public function index(Request $request)
    {
        $todolist = Todolist::all();
        return view('todolist.index' , ['todolist' => $todolist]);
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
        return redirect('folder');
    }

    // タスクの編集(GET)
    public function edit(Request $request)
    {
        $todo = Todolist::find($request->id);
        return view('todolist.edit', ['form' => $todo]);
    }

    // タスクの編集(POST)
    public function update(Request $request)
    {
        $this->validate($request, Todolist::$rules);
        $todo = Todolist::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $todo->fill($form)->save();
        return redirect('/folder');

    }

    // タスクの削除(GET)
    public function delete(Request $request)
    {
        $todo = Todolist::find($request->id);
        return view('todolist.del', ['form' => $todo]);
    }

    // タスクの削除(POST)
    public function remove(Request $request)
    {
        Todolist::find($request->id)->delete();
        return redirect('/folder');

    }

    // 完了済みフォルダの表示
    public function done(Request $request){
        $page = DB::table('todolists')->Paginate(3);
        return view ('todolist.done',['page' => $page]);
    }

    // 検索(GET)
    public function find(Request $request)
    {
        $todoitems = Todolist::all();
        return view('todolist.search', ['input'=>'',
        'todoitems' => $todoitems]);
    }

    // 検索(POST)
    public function search(Request $request)
    {
        // where(フィールド名 , 値)->get();
        $search = Todolist::nameEqual($request->input)->first();
        $todoitems = Todolist::all();
        $param = ['input' => $request->input,
                  'search' => $search,
                  'todoitems' => $todoitems,];
        return view('todolist.search', $param);
    }

}
